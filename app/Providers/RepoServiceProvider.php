<?php

namespace App\Providers;

use App\Repository\CertifiedUserRepository;
use App\Repository\GeneralUserRepositoryInterface;
use App\Repository\LocationUserRepository;
use App\Repository\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind('App\Repository\UserRepositoryInterface', 'App\Repository\UserRepository');
        // $this->app->bind('App\Repository\CertifiedUserRepositoryInterface', 'App\Repository\CertifiedUserRepository');
        // $this->app->bind('App\Repository\LocationUserRepositoryInterface', 'App\Repository\LocationUserRepository');

        $this->app->when('App\Http\Controllers\Api\UserController')
            ->needs('App\Repository\GeneralUserRepositoryInterface')
            ->give('App\Repository\UserRepository');

        $this->app->when('App\Http\Controllers\Api\LocationUserController')
            ->needs('App\Repository\GeneralUserRepositoryInterface')
            ->give('App\Repository\LocationUserRepository');

        $this->app->when('App\Http\Controllers\Api\CertifiedUserController')
            ->needs('App\Repository\GeneralUserRepositoryInterface')
            ->give('App\Repository\CertifiedUserRepository');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
