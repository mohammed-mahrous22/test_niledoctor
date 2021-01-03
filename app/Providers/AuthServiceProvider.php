<?php

namespace App\Providers;

use Illuminate\Foundation\Auth\User;
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

        Gate::define('make-patient', function (User $user) {
            return $user->type === 'doctor';
        });

        Gate::define('make-appointment', function (User $user) {
            return $user->type === 'doctor' or $user->type === 'receptionist' ;
        });
        Gate::define('update-appointment', function (User $user) {
            return $user->type === 'doctor' or $user->type === 'receptionist' ;
        });
    }
}
