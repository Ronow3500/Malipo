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

        Gate::define('logged-in', function($user)
        {
            return $user;
        });

        Gate::define('is-admin', function($user)
        {
            return $user->hasAnyRole('System Admin');
        });

        Gate::define('is-finance', function($user)
        {
            return $user->hasAnyRole('Finance');
        });

        Gate::define('is-staff', function($user)
        {
            return $user->hasAnyRole('Staff');
        });
    }
}
