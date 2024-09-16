<?php

namespace KrZar\LaravelOpenAiApi\FineTuning\DTO\Job\Checkpoint;

readonly class FineTuningJobCheckpointMetrics
{
    public function __construct(
        public int $step,
        public float $trainLoss,
        public float $trainMeanTokenAccuracy,
        public float $validLoss,
        public float $validMeanTokenAccuracy,
        public float $fullValidLoss,
        public float $fullValidMeanTokenAccuracy,
    )
    {
    }

    public static function fromArray(array $data): FineTuningJobCheckpointMetrics
    {
        return new self(
            step: $data['step'],
            trainLoss: $data['train_loss'],
            trainMeanTokenAccuracy: $data['train_mean_token_accuracy'],
            validLoss: $data['valid_loss'],
            validMeanTokenAccuracy: $data['valid_mean_token_accuracy'],
            fullValidLoss: $data['full_valid_loss'],
            fullValidMeanTokenAccuracy: $data['full_valid_mean_token_accuracy'],
        );
    }
}
