# Laravel Open AI Api Connector (BETA)
![license mit](https://badgen.net/github/license/krzar/laravel-openai-api)
![release](https://badgen.net/github/release/krzar/laravel-openai-api/master)
![last commit](https://badgen.net/github/last-commit/krzar/laravel-openai-api)

This package allow you to connect to OpenAI API and use it in your Laravel application.

## Requirements

- Laravel 11.x
- PHP 8.2+


## Installation

```bash
composer require krzar/laravel-openai-api
```

## Usage

For more details about OpenAI API visit [OpenAI API](https://platform.openai.com/docs/api-reference)

### Configuration

Add your OpenAI API key to your `.env` file:

```dotenv
OPENAI_API_KEY=your-api-key
OPENAI_ORGANIZATION=your-organization
OPENAI_PROJECT=your-project
```

### Config file
You can publish and edit the configuration file:

```bash
php artisan vendor:publish --provider="KrZar\OpenAi\OpenAiServiceProvider"
```

### Usage

Example of usage chat endpoint:

```php
use KrZar\LaravelOpenAiApi\Chat\ChatConnector;
use KrZar\LaravelOpenAiApi\Chat\ValueObjects\ChatModel;

$chatConnector = new ChatConnector();

$response = $chatConnector->createCompletion('Send me random text', ChatModel::GPT4o);
```
