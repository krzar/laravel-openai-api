<?php

namespace KrZar\LaravelOpenAiApi\Models;

use KrZar\LaravelOpenAiApi\Base\OpenAiConnector;
use KrZar\LaravelOpenAiApi\Base\Responses\DeletionStatusResponse;
use KrZar\LaravelOpenAiApi\Base\ValueObjects\ApiVersion;
use KrZar\LaravelOpenAiApi\Models\Responses\ModelListResponse;
use KrZar\LaravelOpenAiApi\Models\Responses\ModelResponse;

class ModelsConnector extends OpenAiConnector
{
    public function listModels(): ModelListResponse
    {
        $response = $this->get(ApiVersion::V1, 'models')->json();

        return ModelListResponse::create($response);
    }

    public function retrieveModel(string $model): ModelResponse
    {
        $response = $this->get(ApiVersion::V1, "models/$model")->json();

        return ModelResponse::create($response);
    }

    public function deleteFineTunedModel(string $model): DeletionStatusResponse
    {
        $response = $this->delete(ApiVersion::V1, "models/$model")->json();

        return DeletionStatusResponse::create($response);
    }
}
