<?php

namespace KrZar\LaravelOpenAiApi\FineTuning;

use KrZar\LaravelOpenAiApi\Base\OpenAiConnector;
use KrZar\LaravelOpenAiApi\Base\ValueObjects\ApiVersion;
use KrZar\LaravelOpenAiApi\Chat\ValueObjects\ChatModel;
use KrZar\LaravelOpenAiApi\FineTuning\Collections\IntegrationsCollection;
use KrZar\LaravelOpenAiApi\FineTuning\DTO\HyperParameters;
use KrZar\LaravelOpenAiApi\FineTuning\DTO\Integrations\Integration;
use KrZar\LaravelOpenAiApi\FineTuning\Responses\FineTuningJobCheckpointsListResponse;
use KrZar\LaravelOpenAiApi\FineTuning\Responses\FineTuningJobEventsListResponse;
use KrZar\LaravelOpenAiApi\FineTuning\Responses\FineTuningJobResponse;
use KrZar\LaravelOpenAiApi\FineTuning\Responses\FineTuningJobsListResponse;

class FineTuningConnector extends OpenAiConnector
{
    public function createFineTuningJob(
        ChatModel $model,
        string $trainingFileId,
        ?HyperParameters $hyperParameters = null,
        ?string $suffix = null,
        ?string $validationFileId = null,
        ?IntegrationsCollection $integrations = null,
        ?int $seed = null,
    ): FineTuningJobResponse
    {
        $response = $this->post(
            ApiVersion::V1,
            'fine_tuning/jobs',
            [
                'model' => $model->value,
                'training_file' => $trainingFileId,
                'hyperparameters' => $hyperParameters?->toArray(),
                'suffix' => $suffix,
                'validation_file' => $validationFileId,
                'integrations' => $integrations?->map(fn(Integration $integration) => $integration->toArray())->toArray(),
                'seed' => $seed,
            ]
        )->json();

        return FineTuningJobResponse::create($response);
    }

    public function listFineTuningJobs(
        ?string $after = null,
        ?int $limit = null,
    ): FineTuningJobsListResponse
    {
        $response = $this->get(
            ApiVersion::V1,
            'fine_tuning/jobs',
            [
                'after' => $after,
                'limit' => $limit,
            ]
        )->json();

        return FineTuningJobsListResponse::create($response);
    }

    public function listFineTuningJobEvents(
        string $fineTuningJobId,
        ?string $after = null,
        ?int $limit = null,
    ): FineTuningJobEventsListResponse
    {
        $response = $this->get(
            ApiVersion::V1,
            "fine_tuning/jobs/{$fineTuningJobId}/events",
            [
                'after' => $after,
                'limit' => $limit,
            ]
        )->json();

        return FineTuningJobEventsListResponse::create($response);
    }

    public function listFineTuningJobCheckpoints(
        string $fineTuningJobId,
        ?string $after = null,
        ?int $limit = null,
    ): FineTuningJobCheckpointsListResponse
    {
        $response = $this->get(
            ApiVersion::V1,
            "fine_tuning/jobs/{$fineTuningJobId}/checkpoints",
            [
                'after' => $after,
                'limit' => $limit,
            ]
        )->json();

        return FineTuningJobCheckpointsListResponse::create($response);
    }

    public function retrieveFineTuningJob(string $fineTuningJobId): FineTuningJobResponse
    {
        $response = $this->get(
            ApiVersion::V1,
            "fine_tuning/jobs/{$fineTuningJobId}"
        )->json();

        return FineTuningJobResponse::create($response);
    }

    public function cancelFineTuning(string $fineTuningJobId): FineTuningJobResponse
    {
        $response = $this->post(
            ApiVersion::V1,
            "fine_tuning/jobs/{$fineTuningJobId}/cancel"
        )->json();

        return FineTuningJobResponse::create($response);
    }
}
