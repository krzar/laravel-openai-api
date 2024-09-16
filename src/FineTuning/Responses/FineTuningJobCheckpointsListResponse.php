<?php

namespace KrZar\LaravelOpenAiApi\FineTuning\Responses;

use KrZar\ArrayDto\Casts\ClosureCast;
use KrZar\LaravelOpenAiApi\Base\Responses\ListResponse;
use KrZar\LaravelOpenAiApi\FineTuning\DTO\Job\Checkpoint\FineTuningJobCheckpoint;

class FineTuningJobCheckpointsListResponse extends ListResponse
{
    protected function casts(): array
    {
        return [
            ...parent::casts(),
            'data' => new ClosureCast(
                fn(array $value) => collect($value)->map(fn(array $item) => FineTuningJobCheckpoint::fromArray($item))
            ),
        ];
    }
}
