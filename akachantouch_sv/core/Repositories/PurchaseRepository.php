<?php

namespace Core\Repositories;

use Core\Models\Purchase;
use Core\Repositories\Contracts\PurchaseRepositoryContract;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PurchaseRepository implements PurchaseRepositoryContract
{
    protected $model;

    public function __construct(Purchase $model)
    {
        $this->model = $model;
    }

    public function get()
    {
        $user = auth()->user();
        $data =  $user->purchase()->paginate(20);
        return $data;
    }
    public function isPurchased()
    {
        $user = Auth::user();

        $purchased = $this->model
            ->where('user_id', $user->id)
            ->where('platform_id', $user->platform_id)
            ->whereIn('propaty_code', [config('purchase.PROPATY_ANDROID_SUCCESS'), config('purchase.PROPATY_IOS_SUCCESS')])
            ->first();

        return $purchased;
    }

    public function store($data)
    {
        $user = auth()->user();
        $purchased = $this->isPurchased();

        if (!isset($purchased)) {
            return $this->model->create([
                'user_id' => $user->id,
                'platform_id' => $user->platform_id,
                'product_code' => $data['product_code'],
                'expires_date' => $data['expires_date'],
                'receipt' => $data['receipt'],
                'transaction_id' => $data['transaction_id'],
                'signature' => $data['signature'],
                'order_id' => $data['order_id'],
                'json_data' => $data['json_data'],
                'propaty_code' => $data['propaty_code']
            ]);
        } else {
            $this->model
                ->where('user_id', $user->id)
                ->where('platform_id', $user->platform_id)
                ->whereIn('propaty_code', [config('purchase.PROPATY_ANDROID_SUCCESS'), config('purchase.PROPATY_IOS_SUCCESS')])
                ->update([
                    'expires_date' => $data['expires_date'],
                    'receipt' => $data['receipt'],
                    'transaction_id' => $data['transaction_id'],
                    'signature' => $data['signature'],
                    'order_id' => $data['order_id'],
                    'json_data' => $data['json_data']
                ]);
        }

        return $purchased;
    }

    public function findByTransactionId($transactionId)
    {
        $user = auth()->user();
        return $user->purchase()
            ->where('transaction_id', $transactionId)
            ->get();
    }

    public function findBySignature($signature, $codeSuccess)
    {
        $user = auth()->user();
        return $user->purchase()
            ->where('signature', $signature)
            ->where('propaty_code', $codeSuccess)
            ->first();
    }
}

