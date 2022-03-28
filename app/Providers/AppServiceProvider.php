<?php

namespace App\Providers;

use App\Repositories\Admin\AdminRepository;
use App\Repositories\Admin\AdminRepositoryInterface;
use App\Repositories\Home\HomeRepositoryInterface;
use App\Repositories\Home\HomeRepository;
use App\Repositories\Transactions\TransactionRepository;
use App\Repositories\Transactions\TransactionRepositoryInterface;
use App\Repositories\Users\UserRepository;
use App\Repositories\Users\UserRepositoryInterface;
use App\Services\Admin\AdminService;
use App\Services\Admin\AdminServiceInterface;
use App\Services\Home\HomeService;
use App\Services\Home\HomeServiceInterface;
use App\Services\Transactions\TransactionService;
use App\Services\Transactions\TransactionServiceInterface;
use App\Services\Users\UserService;
use App\Services\Users\UserServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         // User Binding
         $this->app->bind(UserServiceInterface::class, UserService::class);
         $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
 
         // Transaction Binding
         $this->app->bind(TransactionServiceInterface::class, TransactionService::class);
         $this->app->bind(TransactionRepositoryInterface::class, TransactionRepository::class);
 
         // Home Binding
         $this->app->bind(HomeServiceInterface::class, HomeService::class);
         $this->app->bind(HomeRepositoryInterface::class, HomeRepository::class);

        // Admin Binding
        $this->app->bind(AdminServiceInterface::class, AdminService::class);
        $this->app->bind(AdminRepositoryInterface::class, AdminRepository::class);
         
    }
}
