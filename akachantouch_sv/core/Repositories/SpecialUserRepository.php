<?php

namespace Core\Repositories;

use Core\Models\SpecialUser;
use Core\Repositories\Contracts\SpecialUserRepositoryContract;

class SpecialUserRepository implements SpecialUserRepositoryContract
{
    protected $model;

    public function __construct(SpecialUser $model)
    {
        $this->model = $model;
    }

    public function set($flg)
    {
        $user = auth()->user();
        return $this->model
            ->where('user_id', $user->id)
            ->update([
                'flg' => $flg
            ]);
    }
}

