<?php

namespace KrZar\LaravelOpenAiApi\FineTuning\DTO\Job;

use Illuminate\Support\Carbon;

readonly class FineTuningJobEvent
{
    public function __construct(
        public string $object,
        public string $id,
        public Carbon $createdAt,
        public string $level,
        public string $message,
    )
    {
    }

    public static function fromArray(array $data): FineTuningJobEvent
    {
        return new self(
            object: $data['object'],
            id: $data['id'],
            createdAt: Carbon::createFromTimestamp($data['created_at']),
            level: $data['level'],
            message: $data['message'],
        );
    }
}
