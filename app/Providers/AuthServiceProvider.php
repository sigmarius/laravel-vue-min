<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\AdminUser;
use App\Models\Post;
use App\Policies\PostPolicy;
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
        Post::class => PostPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // регистрируем политики
        $this->registerPolicies();

        // если пользователь имеет роль Admin, ему будут доступны все действия
        Gate::before(function (AdminUser $user) {
            return $user->roles->containsStrict('id', 1);
        });

        Gate::define('update-post', function (AdminUser $user, Post $post) {
            return $user->roles->containsStrict('id', 1);
        });

        Gate::define('delete-post', function (AdminUser $user, Post $post) {
            return $user->roles->containsStrict('id', 1);
        });
    }
}
