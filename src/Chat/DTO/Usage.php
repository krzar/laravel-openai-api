<?php

namespace KrZar\LaravelOpenAiApi\Chat\DTO;

readonly class Usage
{
    public function __construct(
        public int $completionTokens,
        public int $promptTokens,
        public int $totalTokens,
    )
    {
    }

    public static function fromArray(array $data): Usage
    {
        return new self(
            completionTokens: $data['completion_tokens'],
            promptTokens: $data['prompt_tokens'],
            totalTokens: $data['total_tokens'],
        );
    }
}
