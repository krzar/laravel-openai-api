<?php

namespace KrZar\LaravelOpenAiApi\FineTuning\DTO\Error;

readonly class FineTuningJobError
{
    public function __construct(
        public string $code,
        public string $message,
        public ?string $param,
    )
    {
    }

    public static function fromArray(array $data): FineTuningJobError
    {
        return new self(
            code: $data['code'],
            message: $data['message'],
            param: $data['param'] ?? null,
        );
    }
}
