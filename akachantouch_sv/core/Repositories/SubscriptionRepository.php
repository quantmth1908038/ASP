<?php

namespace Core\Repositories;

use Core\Models\Subscription;
use Core\Repositories\Contracts\SubscriptionRepositoryContract;

class SubscriptionRepository implements SubscriptionRepositoryContract
{
    protected $model;

    public function __construct(Subscription $model)
    {
        $this->model = $model;
    }

    public function update($expires_date)
    {
        return $this->model->where('user_id', auth()->user()->id)->update([
            'expires_date' => $expires_date
        ]);
    }

}