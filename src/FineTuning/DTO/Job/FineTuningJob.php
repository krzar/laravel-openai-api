<?php

namespace KrZar\LaravelOpenAiApi\FineTuning\DTO\Job;

use Illuminate\Support\Carbon;

readonly class FineTuningJob
{
    public function __construct(
        public string $id,
        public Carbon $createdAt,
        public string $level,
        public string $message,
        public string $object
    )
    {
    }
}
