# Ollama Laravel client

Laravel client for the Ollama API using 

For more information see:
* [Ollama API documentation](https://github.com/ollama/ollama/blob/main/docs/api.md) 
* [Ollama php client](https://github.com/hanwoolderink88/ollama-php-client)

## Installation
```bash
composer require hanwoolderink/ollama-laravel-client
```

## Configuration
```bash
php artisan vendor:publish
```

## Usage
Basic usage example:

```php
use Hanwoolderink\Ollama\Laravel\Facades\Ollama;

$response = Ollama::chat()->create(
  model: 'llama3.1:latest', 
  message: Message::make('Why is the sky blue?')
);

echo $response->message->content;
```

Stream example:

```php
use Hanwoolderink\Ollama\Laravel\Facades\Ollama;
use Hanwoolderink\Ollama\Dtos\Message;

$response = Ollama::chat()->stream(
    model: 'llama3.1:latest',
    messages: [
        Message::make('Why does the sky appear more blue in the morning and more red in the evening?')
    ],
);

foreach ($response as $streamResponse) {
    // update storage, socket, etc.. This prints to cli
    $stream = fopen('php://stdout', 'w');
    fwrite($stream, $streamResponse->message->content);
    fclose($stream);
}
```