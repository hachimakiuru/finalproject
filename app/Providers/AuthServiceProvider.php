<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Role
        Gate::define('admin', function (User $user): bool {
            return $user->role_id === 1; // Assuming 1 is the ID of the 'Admin' role
        });

        // Permission
        // Gate::define('user.delete', function (User $user,): bool {
        //     return (bool) $user->is_admin;
        // });

        // Gate::define('admin', function (User $user): bool {
        //     return (bool) $user->is_admin;
        // });

        Gate::define('employee', function (User $user): bool {
            return $user->role_id === 2; // Assuming 2 is the ID of the 'Employee' role
        });
        Gate::define('guest', function (User $user): bool {
            return $user->role_id === 3; // Assuming 2 is the ID of the 'Employee' role
        });
    }
}
