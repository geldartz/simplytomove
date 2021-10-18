<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        

        Gate::define('isAdmin', function ($user) {
            return $user->type === 'admin';
        });

        Gate::define('isTenant', function ($user) {
            return $user->type === 'tenant';
        });
        Gate::define('isAgent', function ($user) {
            return $user->type === 'agent';
        });
        Gate::define('isAgency', function ($user) {
            return $user->type === 'agency';
        });
        Gate::define('isLandlord', function ($user) {
            return $user->type === 'landlord';
        });
        Gate::define('isUser', function ($user) {
            return $user->type === 'user';
        });
        
    }
}
