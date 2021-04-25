<?php

namespace Core\Providers;

use Core\Repositories\Contracts\SpecialUserRepositoryContract;
use Core\Repositories\SpecialUserRepository;
use Illuminate\Support\ServiceProvider;
use Core\Modules\ModuleServiceProvider;

use Core\Services\Contracts\AuthServiceContract;
use Core\Services\AuthService;

use Core\Repositories\Contracts\UserRepositoryContract;
use Core\Repositories\UserRepository;

use Core\Services\Contracts\PurchaseServiceContract;
use Core\Services\PurchaseService;

use Core\Repositories\Contracts\PurchaseRepositoryContract;
use Core\Repositories\PurchaseRepository;

use Core\Repositories\Contracts\SubscriptionRepositoryContract;
use Core\Repositories\SubscriptionRepository;


class CoreServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
        $this->app->register(ModuleServiceProvider::class);


        $this->app->bind( AuthServiceContract::class                , AuthService::class                    );
        $this->app->bind( UserRepositoryContract::class             , UserRepository::class                 );
        $this->app->bind( SpecialUserRepositoryContract::class      , SpecialUserRepository::class          );
        $this->app->bind( PurchaseServiceContract::class            , PurchaseService::class                );
        $this->app->bind( PurchaseRepositoryContract::class         , PurchaseRepository::class             );
        $this->app->bind( SubscriptionRepositoryContract::class     , SubscriptionRepository::class         );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }
}
