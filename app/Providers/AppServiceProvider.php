<?php

namespace App\Providers;

use App\Models\Idea;
use App\Models\User;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive(); //Fix the pagination

        //Role
        Gate::define('admin', function (User $user): bool {
            return (bool) $user->is_admin;
        });

        //Count ideas of the user (use relationship in withCount), use this variable to all views
        View::share('topUsers', User::withCount('ideas')->orderBy('ideas_count', 'DESC')->limit(5)->get());

        /*

        We can use gates to define permissions, but in this project, we will use policy (Its more easy to maint)

        Gate::define('idea.delete', function (User $user, Idea $idea): bool {
            return ((bool) $user->is_admin || $user->id === $idea->user_id);
        });

        Gate::define('idea.update', function (User $user, Idea $idea): bool {
            return ((bool) $user->is_admin || $user->id === $idea->user_id);
        });

        */
    }
}
