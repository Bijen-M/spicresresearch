<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\Department;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Department $department, Setting $setting)
    {
        Schema::defaultStringLength(191);
        $departments = $department->all()->pluck('title', 'id');
        view()->share('departments', $departments);
        $settings = $setting->first();
        view()->share('settings', $settings);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
