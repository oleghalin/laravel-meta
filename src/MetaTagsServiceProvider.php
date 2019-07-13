<?php

namespace Khalin\Meta;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Khalin\Meta\Sources\ContainerSource;

class MetaTagsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/metatags.php.php' => config_path('metatags.php'),
            ], 'config');
        }

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'metatags');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/metatags.php', 'metatags');

        $this->app->singleton(SourceInterface::class, config('metatags.default_source', ContainerSource::class));

        $this->app->singleton(MetaTags::class, function () {
            return new MetaTags($this->app->make(SourceInterface::class));
        });
    }
}
