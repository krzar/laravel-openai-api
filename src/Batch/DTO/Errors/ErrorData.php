<?php

namespace KrZar\LaravelOpenAiApi\Batch\DTO\Errors;

readonly class ErrorData
{
    public function __construct(
        public string $code,
        public string $message,
        public ?string $param,
        public ?string $line,
    )
    {
    }

    public static function fromArray(array $data): ErrorData
    {
        return new self(
            code: $data['code'],
            message: $data['message'],
            param: $data['param'] ?? null,
            line: $data['line'] ?? null,
        );
    }
}
