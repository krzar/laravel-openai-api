<?php

namespace KrZar\LaravelOpenAiApi\Batch\DTO;

readonly class RequestCounts
{
    public function __construct(
        public int $total,
        public int $completed,
        public int $failed,
    )
    {
    }

    public static function fromArray(array $data): RequestCounts
    {
        return new self(
            total: $data['total'],
            completed: $data['completed'],
            failed: $data['failed'],
        );
    }
}
