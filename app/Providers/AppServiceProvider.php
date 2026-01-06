<?php

namespace App\Providers;

use App\Models\Employer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\JobPost;
use App\Policies\EmployerPolicy;
use App\Policies\JobPolicy;

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
        // Register the policy
        Gate::policy(JobPost::class, JobPolicy::class);
        Gate::policy( Employer::class, EmployerPolicy::class);
    }
}