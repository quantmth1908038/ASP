<?php

namespace Core\Services;

use Core\Repositories\Contracts\PurchaseRepositoryContract;
use Core\Services\Contracts\PurchaseServiceContract;
use GuzzleHttp\Client;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Symfony\Component\ErrorHandler\Debug;
use function Psy\debug;


class PurchaseService implements PurchaseServiceContract
{
    protected $purchase;

    public function __construct(PurchaseRepositoryContract $purchase)
    {
        $this->purchase = $purchase;
    }

    public function get()
    {
        return $this->purchase->get();
    }

    public function store($data)
    {
        return $this->purchase->store($data);
    }

    public function receiptCheck($request){
        //ios

        $expires_date = '';
        $status = config('purchase.PROPATY_IOS_FAILURE');

        $PRODUCT_URL = "https://buy.itunes.apple.com/verifyReceipt";
        $SANDBOX_URL = "https://sandbox.itunes.apple.com/verifyReceipt";

        $data = [
            'receipt-data' => $request->receipt,
            'password' => config('purchase.IOS_PASSWORD'),
            'exclude-old-transactions' => true
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $PRODUCT_URL,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                "accept: */*",
                "accept-language: en-US,en;q=0.8",
                "content-type: application/json",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $result =  json_decode($response);

        if (!$err) {
            if ($result->status == 21007) {
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => $SANDBOX_URL,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30000,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => json_encode($data),
                    CURLOPT_HTTPHEADER => array(
                        "accept: */*",
                        "accept-language: en-US,en;q=0.8",
                        "content-type: application/json",
                    ),
                ));
                $response = curl_exec($curl);
                $err = curl_error($curl);
                curl_close($curl);
                $result =  json_decode($response);

            }
        }

        // 検証成功の場合
        if (!$err) {
            if ($result->status == 0) {
                $renewal = $result->pending_renewal_info[0]->auto_renew_status;
                if ($renewal) {
                    $latest_data = end($result->latest_receipt_info);
                    $transaction_id = $latest_data->transaction_id;
                    $expires_date = $latest_data->expires_date_ms;
                } else {
                    $last_receipt = end($result->receipt->in_app);
                    $transaction_id = $last_receipt->transaction_id;
                    $expires_date = $last_receipt->expires_date_ms;
                }

                $now = Carbon::now()->timestamp * 1000;
                if ($expires_date <= $now) {
                    $receipts = $result->latest_receipt_info;
                    foreach ($receipts as $receipt) {
                        if ($receipt->expires_date_ms >= $now) {
                            $expires_date = $receipt->expires_date_ms;
                            $transaction_id = $receipt->transaction_id;
                        }
                    }
                }

                if ($transaction_id) {
                    $t_payment = $this->purchase->findByTransactionId($transaction_id);
                    if(isset($t_payment[0])){
                        $status = config('purchase.PROPATY_IOS_DUPLICATION');
                    } else {
                        $status = config('purchase.PROPATY_IOS_SUCCESS');
                    }
                }
                $expires_date = Carbon::parse($expires_date/1000);
                $expires_date->setTimezone('Asia/Tokyo');
            }
        }

        return array(
            'transaction_id' => ($transaction_id??null),
            'expires_date' => $expires_date,
            'status' => $status
        );
    }


    public function signatureCheck($request){
        $expires_date = '';
        $status = config('purchase.PROPATY_ANDROID_FAILURE');

        if ($request->package_name) {
            $packageName = $request->package_name;
        } else {
            $packageName = config('purchase.PACKAGE_NAME');
        }

        $json_data = json_decode($request->json_data);
        $token = $json_data->purchaseToken;
        $subscriptionId = $request->product_code;
        $signed_data = $request->json_data;
        $signature = base64_decode($request->signature);

        $cert = "-----BEGIN PUBLIC KEY-----" . PHP_EOL .
            chunk_split(config('purchase.GOOGLE_PLAY_RSA_KEY'), 64, PHP_EOL) .
            "-----END PUBLIC KEY-----";

        $pubkey = openssl_get_publickey($cert);

        $result = openssl_verify($signed_data, $signature, $pubkey, OPENSSL_ALGO_SHA1);

        if ($result == 1) {
            $TOKEN_URL = "https://www.googleapis.com/oauth2/v4/token";
            $VALIDATE_URL = "https://www.googleapis.com/androidpublisher/v3/applications/".
                $packageName."/purchases/subscriptions/".
                $subscriptionId."/tokens/".$token;

            $data = [
                'refresh_token' => config('purchase.GOOGLE_REFRESH_TOKEN'),
                'client_secret' => config('purchase.GOOGLE_CLIENT_SECRET'),
                'client_id' => config('purchase.GOOGLE_CLIENT_ID'),
                'redirect_uri' => config('purchase.GOOGLE_REDIRECT_URI'),
                'grant_type' => 'refresh_token',
            ];
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $TOKEN_URL,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30000,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($data),
                CURLOPT_HTTPHEADER => array(
                    "accept: */*",
                    "accept-language: en-US,en;q=0.8",
                    "content-type: application/json",
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);

            if (!$err) {
                $response = json_decode($response);
                if (!$response || !isset($response->access_token)) {
                    $status = config('purchase.PROPATY_ANDROID_FAILURE');
                } else {
                    $curl = curl_init();
                    curl_setopt($curl,CURLOPT_URL,$VALIDATE_URL."?access_token=".$response->access_token);
                    curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
                    $response = curl_exec($curl);
                    $err = curl_error($curl);
                    curl_close($curl);
                    $response = json_decode($response);
                    if (!$response || !isset($response->expiryTimeMillis)) {
                        $status = config('purchase.PROPATY_ANDROID_FAILURE');
                    } else {
                        $expires_date = Carbon::parse($response->expiryTimeMillis/1000);
                        $expires_date->setTimezone('Asia/Tokyo');

                        $t_payment = $this->purchase->findBySignature($request->signature, config('purchase.PROPATY_ANDROID_SUCCESS'));
                        if(isset($t_payment['id'])){
                            $status = config('purchase.PROPATY_ANDROID_DUPLICATION');
                        } else {
                            $status = config('purchase.PROPATY_ANDROID_SUCCESS');
                        }
                    }
                }
            }
        }
        openssl_free_key($pubkey);

        return array(
            'expires_date' => $expires_date,
            'status' => $status
        );
    }

    public function platformCheck($data)
    {
        if ($data->receipt) {
            $checkStatus =  $this->receiptCheck($data);
        } elseif ($data->signature) {
            $checkStatus =  $this->signatureCheck($data);
        } else {
            return response()->json('No data', 200);
        }
        return $checkStatus;
    }

    public function isPurchased()
    {
        return $this->purchase->isPurchased();
    }

}
