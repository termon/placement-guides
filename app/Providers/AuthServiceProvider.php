<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\BookPolicy;
use App\Enums\Role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
        $this->registerPolicies();

        Gate::define('admin', function (User $user) {
            return $user->role === Role::ADMIN->value;
        });
        Gate::define('staff', function (User $user) {
            return $user->role === Role::STAFF->value;
        });

        // Gate::define('author', function (User $user) {
        //     return $user->role === Role::STAFF->value;
        // });

        // Gate::define('create', function (User $user) {
        //     return $user->role === Role::STAFF->value;
        // });
        // Gate::define('edit', function (User $user, \App\Models\Book $book) {
        //     return $user->id === $book?->user_id;
        // });
        // Gate::define('delete', function (User $user, \App\Models\Book $book) {
        //     return $user->id === $book?->user_id;
        // });
    }
}
