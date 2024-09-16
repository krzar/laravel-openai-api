<?php

namespace KrZar\LaravelOpenAiApi;

use Illuminate\Support\ServiceProvider;

class LaravelOpenAiApiServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/openai.php' => config_path('openai.php'),
        ]);
    }
}
