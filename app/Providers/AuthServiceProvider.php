<?php

namespace App\Providers;
use App\Models\Year;
use App\Models\User;
use App\Policies\YearPolicy;
use Illuminate\Support\Facades\Gate;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [

    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('admin-only', function (User $user) {
            return $user->role == 'admin';
        });

        Gate::define('student-only', function(User $user){
            return $user->role == 'student';
        });

        Gate::define('teacher-only', function(User $user){
            return $user->role == 'teacher';
        });
    }
}
