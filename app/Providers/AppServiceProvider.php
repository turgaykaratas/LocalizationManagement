<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts \{
    IUserService, IProjectService
};
use App\Services \{
    UserService, ProjectService
};
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(IUserService::class, UserService::class);
        $this->app->singleton(IProjectService::class, ProjectService::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [IUserService::class, IProjectService::class];
    }
}
