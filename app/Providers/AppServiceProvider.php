<?php

namespace App\Providers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {

    }


    public function boot(): void
    {
       Gate::define('criar-usuario', function(User $user){
        return $user-> access_level ==='Administrador';
       });
       Paginator::useBootstrapFive();
    }
}
