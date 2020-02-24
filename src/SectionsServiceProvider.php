<?php

namespace Quill\Sections;

use Vellum\Module\Quill;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Quill\Sections\Listeners\RegisterSectionsModule;
use Quill\Sections\Listeners\RegisterSectionsPermissionModule;
use Quill\Sections\Resource\SectionsResource;
use App\Resource\Sections\SectionsRootResource;
use Quill\Sections\Models\SectionsObserver;

class SectionsServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadModuleCommands();
        $this->loadRoutesFrom(__DIR__ . '/routes/sections.php');
        $this->loadViewsFrom(__DIR__ . '/views', 'sections');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->mergeConfigFrom(__DIR__ . '/config/sections.php', 'sections');

        SectionsResource::observe(SectionsObserver::class);

        if (class_exists('App\Resource\Sections\SectionsRootResource')) {
        	SectionsRootResource::observe(SectionsObserver::class);
        }

        // $this->publishes([
        //     __DIR__ . '/config/sections.php' => config_path('sections.php'),
        // ], 'sections.config');

        // $this->publishes([
        //    __DIR__ . '/views' => resource_path('/vendor/sections'),
        // ], 'sections.views');

        $this->publishes([
        	__DIR__ . '/database/factories/SectionsFactory.php' => database_path('factories/SectionsFactory.php'),
            __DIR__ . '/database/seeds/SectionsTableSeeder.php' => database_path('seeds/SectionsTableSeeder.php'),
        ], 'sections.migration');
    }

    public function register()
    {
        Event::listen(Quill::MODULE, RegisterSectionsModule::class);
        Event::listen(Quill::PERMISSION, RegisterSectionsPermissionModule::class);
    }

    public function loadModuleCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([

            ]);
        }
    }
}
