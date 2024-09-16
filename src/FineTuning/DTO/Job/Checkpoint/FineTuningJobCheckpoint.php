<?php

namespace KrZar\LaravelOpenAiApi\FineTuning\DTO\Job\Checkpoint;

use Illuminate\Support\Carbon;

readonly class FineTuningJobCheckpoint
{
    public function __construct(
        public string $object,
        public string $id,
        public Carbon $createdAt,
        public string $fineTunedModeLCheckpoint,
        public int $stepNumber,
        public FineTuningJobCheckpointMetrics $metrics,
        public string $fineTuningJobId,
    )
    {
    }

    public static function fromArray(array $data): FineTuningJobCheckpoint
    {
        return new self(
            object: $data['object'],
            id: $data['id'],
            createdAt: Carbon::createFromTimestamp($data['created_at']),
            fineTunedModeLCheckpoint: $data['fine_tuned_model_checkpoint'],
            stepNumber: $data['step_number'],
            metrics: FineTuningJobCheckpointMetrics::fromArray($data['metrics']),
            fineTuningJobId: $data['fine_tuning_job_id'],
        );
    }
}
