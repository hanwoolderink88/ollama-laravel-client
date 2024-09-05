<?php

declare(strict_types=1);

namespace Hanwoolderink\Ollama\Laravel\Facades;

use Hanwoolderink\Ollama\Http\ChatRequests;
use Hanwoolderink\Ollama\Http\CompletionRequests;
use Hanwoolderink\Ollama\Http\ModelRequests;
use Hanwoolderink\Ollama\Ollama as ConcreteOllama;
use Illuminate\Support\Facades\Facade;

/**
 * @method static ModelRequests model()
 * @method static CompletionRequests completion()
 * @method static ChatRequests chat()
 *
 * @see ConcreteOllama
 */
class Ollama extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return ConcreteOllama::class;
    }
}
