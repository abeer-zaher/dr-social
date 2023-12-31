<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use laravel\Passport\Passport;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
         'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        

         Gate::define('edit-users', function($user){
            return $user->hasRole('admin');
         });
         Gate::define('delete-users', function($user){
            return $user->hasRole('admin');
         });

         Gate::define('dashboard', function($user){
            return $user->hasRole('admin');

         });

         Gate::define('geners', function($user){
            return $user->hasRole('admin');

         });

         Gate::define('geners.create', function($user){
            return $user->hasRole('admin');

         });

         Gate::define('geners.store', function($user){
            return $user->hasRole('admin');

         });

         Gate::define('geners.destroy', function($user){
            return $user->hasRole('admin');

         });
    }
}
