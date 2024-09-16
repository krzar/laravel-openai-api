<?php

namespace KrZar\LaravelOpenAiApi\Chat\DTO\Choice;

use KrZar\LaravelOpenAiApi\Chat\DTO\LogProbs\LogProbs;
use KrZar\LaravelOpenAiApi\Chat\ValueObjects\Message\Types\ChatMessage;

readonly class Choice
{
    public function __construct(
        public string $finishReason,
        public int $index,
        public ChatMessage $message,
        public ?LogProbs $logProbs = null,
    )
    {
    }

    public static function fromArray(array $data): Choice
    {
        return new self(
            finishReason: $data['finish_reason'],
            index: $data['index'],
            message: ChatMessage::fromArray($data['message']),
            logProbs: isset($data['logprobs']) ? LogProbs::fromArray(
                $data['logprobs']
            ) : null,
        );
    }
}
