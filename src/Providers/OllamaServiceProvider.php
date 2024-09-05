<?php

declare(strict_types=1);

namespace Hanwoolderink\Ollama\Laravel\Providers;

use GuzzleHttp\Client;
use Hanwoolderink\Ollama\Ollama;
use Illuminate\Support\ServiceProvider;

class OllamaServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(Ollama::class, function () {
            $config = function_exists('config') ? config('ollama.config', []) : [];
            $client = new Client($config);

            return new Ollama($client);
        });

        $this->app->alias(Ollama::class, 'ollama');

        $this->mergeConfigFrom(
            __DIR__.'/../../config/ollama.php', 'ollama'
        );
    }

    public function boot(): void
    {
        if (function_exists('config_path')) {
            $this->publishes([
                __DIR__.'/../../config/ollama.php' => config_path('ollama.php'),
            ]);
        }
    }
}
