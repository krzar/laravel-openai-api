<?php

namespace KrZar\LaravelOpenAiApi\Batch;

use KrZar\LaravelOpenAiApi\Base\OpenAiConnector;
use KrZar\LaravelOpenAiApi\Base\ValueObjects\ApiVersion;
use KrZar\LaravelOpenAiApi\Batch\Responses\BatchListResponse;
use KrZar\LaravelOpenAiApi\Batch\Responses\BatchResponse;
use KrZar\LaravelOpenAiApi\Batch\ValueObjects\BatchEndpoint;

class BatchConnector extends OpenAiConnector
{
    public function createBatch(
        string $inputFileId,
        BatchEndpoint $endpoint,
        ?array $metadata = null,
    ): BatchResponse
    {
        $response = $this->post(
            ApiVersion::V1,
            'batches',
            [
                'input_file_id' => $inputFileId,
                'endpoint' => $endpoint->value,
                'completion_window' => '24h',
                'metadata' => $metadata,
            ]
        )->json();

        return BatchResponse::create($response);
    }

    public function retrieveBatch(string $batchId): BatchResponse
    {
        $response = $this->get(
            ApiVersion::V1,
            "batches/{$batchId}"
        )->json();

        return BatchResponse::create($response);
    }

    public function cancelBatch(string $batchId): BatchResponse
    {
        $response = $this->post(
            ApiVersion::V1,
            "batches/{$batchId}/cancel"
        )->json();

        return BatchResponse::create($response);
    }

    public function listBatch(
        ?string $after = null,
        ?int $limit = null,
    ): BatchListResponse
    {
        $response = $this->get(
            ApiVersion::V1,
            'batches',
            [
                'after' => $after,
                'limit' => $limit,
            ]
        )->json();

        return BatchListResponse::create($response);
    }
}
