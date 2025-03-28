<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
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
    public function boot(): void
    {
        $this->configureCommands();
        $this->configureModels();

    }

    private function configureCommands(): void
    {
        \DB::prohibitDestructiveCommands(
            $this->app->isProduction(),
        );
    }
    private function configureModels(): void
    {
        Model::shouldBeStrict();
        Model::unguard();
    }
}
