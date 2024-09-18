<?php

namespace KrZar\LaravelOpenAiApi;

use Illuminate\Support\ServiceProvider;

class LaravelOpenAiApiServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/openai.php', 'openai'
        );
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/openai.php' => config_path('openai.php'),
        ]);
    }
}
