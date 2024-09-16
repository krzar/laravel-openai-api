<?php

namespace KrZar\LaravelOpenAiApi\FineTuning\Responses;

use Illuminate\Support\Carbon;
use KrZar\ArrayDto\ArrayDto;
use KrZar\ArrayDto\Casts\ClosureCast;
use KrZar\ArrayDto\Casts\NameCast;
use KrZar\LaravelOpenAiApi\Chat\ValueObjects\ChatModel;
use KrZar\LaravelOpenAiApi\FineTuning\Collections\IntegrationsCollection;
use KrZar\LaravelOpenAiApi\FineTuning\DTO\Error\FineTuningJobError;
use KrZar\LaravelOpenAiApi\FineTuning\DTO\HyperParameters;
use KrZar\LaravelOpenAiApi\FineTuning\ValueObjects\Status\JobStatus;

class FineTuningJobResponse extends ArrayDto
{
    public string $id;
    public Carbon $createdAt;
    public ?FineTuningJobError $error;
    public ?string $fineTunedModel;
    public Carbon $finishedAt;
    public HyperParameters $hyperParameters;
    public ChatModel $model;
    public string $organizationId;
    public array $resultFiles;
    public JobStatus $status;
    public ?int $trainedTokens;
    public string $trainingFileId;
    public ?string $validationFileId;
    public IntegrationsCollection $integrations;
    public int $seed;
    public ?Carbon $estimatedFinish;

    protected function casts(): array
    {
        return [
            'createdAt' => [
                new NameCast('created_at'),
                new ClosureCast(fn(int $value) => Carbon::createFromTimestamp($value))
            ],
            'error' => new ClosureCast(fn(array $value) => FineTuningJobError::fromArray($value)),
            'fineTunedModel' => new NameCast('fine_tuned_model'),
            'finishedAt' => [
                new NameCast('finished_at'),
                new ClosureCast(fn(int $value) => Carbon::createFromTimestamp($value))
            ],
            'hyperParameters' => [
                new NameCast('hyperparameters'),
                new ClosureCast(fn(array $value) => new HyperParameters(
                    nEpochs: $value['n_epochs']
                ))
            ],
            'model' => new ClosureCast(fn(string $value) => ChatModel::from($value)),
            'organizationId' => new NameCast('organization_id'),
            'resultFiles' => new NameCast('result_files'),
            'status' => new ClosureCast(fn(string $value) => JobStatus::from($value)),
            'trainedTokens' => new NameCast('trained_tokens'),
            'trainingFileId' => new NameCast('training_file'),
            'validationFileId' => new NameCast('validation_file'),
            'integrations' => new ClosureCast(fn(array $value) => IntegrationsCollection::fromArray($value)),
            'estimatedFinish' => [
                new NameCast('estimated_finish'),
                new ClosureCast(fn(int $value) => Carbon::createFromTimestamp($value))
            ],
        ];
    }
}
