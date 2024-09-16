<?php

namespace KrZar\LaravelOpenAiApi\Base;

use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use KrZar\LaravelOpenAiApi\Base\DTO\RequestFileAttach;
use KrZar\LaravelOpenAiApi\Base\ValueObjects\ApiVersion;
use function KrZar\LaravelOpenAiApi\config;

class OpenAiConnector
{
    private const API_URL = 'https://api.openai.com';
    private string $apiKey = '';
    public function __construct()
    {
        $this->apiKey = config('openai.api_key');
    }

    protected function get(
        ApiVersion $apiVersion,
        string $endpoint,
        array $query = [],
    ): PromiseInterface|Response
    {
        return $this->request()->get(
            $this->prepareUrl($apiVersion, $endpoint),
            $query
        );
    }

    /**
     * @param RequestFileAttach|RequestFileAttach[]|null $fileAttach
     * @throws ConnectionException
     */
    protected function post(
        ApiVersion $apiVersion,
        string $endpoint,
        array $data = [],
        RequestFileAttach|array|null $fileAttach = null,
    ): PromiseInterface|Response
    {
        $request = $this->request();

        if ($fileAttach) {
            if (!is_array($fileAttach)) {
                $fileAttach = [$fileAttach];
            }

            foreach ($fileAttach as $fileAttachItem) {
                $request->attach(
                    $fileAttachItem->key,
                    $fileAttachItem->file,
                    $fileAttachItem->file->getFilename(),
                );
            }
        }

        return $this->request()->post(
            $this->prepareUrl($apiVersion, $endpoint),
            $data
        );
    }

    public function delete(
        ApiVersion $apiVersion,
        string $endpoint
    ): PromiseInterface|Response
    {
        return $this->request()->delete(
            $this->prepareUrl($apiVersion, $endpoint)
        );
    }

    private function request(): PendingRequest
    {
        return Http::withHeaders([
            'Authorization' => sprintf('Bearer %s', $this->apiKey),
            'Content-Type' => 'application/json',
        ]);
    }

    private function prepareUrl(ApiVersion $apiVersion, string $endpoint): string
    {
        return sprintf("%s/%s/%s", self::API_URL, $apiVersion->value, $endpoint);
    }
}
