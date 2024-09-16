<?php

namespace KrZar\LaravelOpenAiApi\Embeddings;

use KrZar\LaravelOpenAiApi\Base\OpenAiConnector;
use KrZar\LaravelOpenAiApi\Base\ValueObjects\ApiVersion;
use KrZar\LaravelOpenAiApi\Embeddings\Responses\EmbeddingResponse;
use KrZar\LaravelOpenAiApi\Embeddings\ValueObjects\EmbeddingsEncodingFormat;
use KrZar\LaravelOpenAiApi\Embeddings\ValueObjects\EmbeddingsModel;

class EmbeddingsConnector extends OpenAiConnector
{
    public function createEmbeddings(
        string|array $input,
        EmbeddingsModel $model,
        ?EmbeddingsEncodingFormat $encodingFormat = null,
        ?int $dimensions = null,
        ?string $user = null,
    ): EmbeddingResponse
    {
        $response = $this->post(
            ApiVersion::V1,
            'embeddings',
            [
                'input' => $input,
                'model' => $model->value,
                'encoding_format' => $encodingFormat?->value,
                'dimensions' => $dimensions,
                'user' => $user,
            ]
        )->json();

        return EmbeddingResponse::create($response);
    }
}
