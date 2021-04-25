<?php

namespace Core\Modules\API\Controllers;

use Carbon\Carbon;
use Core\Repositories\Contracts\SpecialUserRepositoryContract;
use Core\Repositories\Contracts\SubscriptionRepositoryContract;
use Core\Services\Contracts\PurchaseServiceContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PurchaseController extends Controller
{
    protected $service;
    protected $subscription;
    protected $special;

    public function __construct(PurchaseServiceContract $service, SubscriptionRepositoryContract $subscription, SpecialUserRepositoryContract $special)
    {
        $this->service = $service;
        $this->subscription = $subscription;
        $this->special = $special;
    }

    public function post(Request $request)
    {
        //失敗 = 0
        $update_data = 0;
        if ($request->receipt) {
            $request->receipt = str_replace("%2B", "+", $request->receipt);
            $request->receipt = str_replace("%20", "+", $request->receipt);
            $request->receipt = str_replace(" ", "+", $request->receipt);
            $request->receipt = str_replace("%2F", "/", $request->receipt);
        }
        $checkStatus = $this->service->platformCheck($request);
        //save to purchase log

        if ($checkStatus['status']) {
            $request['propaty_code'] = $checkStatus['status'];
            if ($checkStatus['expires_date']) {
                $request['expires_date'] = $checkStatus['expires_date'];
            }
            if ($request->receipt) {
                $request['transaction_id'] = $checkStatus['transaction_id'];
            }
            $purchase_history = $this->service->store($request);
            //is true and update subscription and special
            if ($purchase_history) {
                $expires_date = $checkStatus['expires_date'];
                if ($checkStatus['status'] != config('purchase.PROPATY_ANDROID_FAILURE') || $checkStatus['status'] != config('purchase.PROPATY_IOS_FAILURE')) {
                    $now = Carbon::now();
                    if ($expires_date) {
                    	$this->subscription->update($expires_date);
                    }
                    if ($expires_date > $now) {
                        $update_data = $this->special->set(config('purchase.FLG_TRUE'));
                    }
                }
            }
        }

        return response()->json($update_data, 200);
    }

}
