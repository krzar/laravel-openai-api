<?php

namespace KrZar\LaravelOpenAiApi\Chat\DTO\Message\ToolCall;

readonly class ToolCall
{
    public function __construct(
        public string $id,
        public ToolCallFunction $function,
    )
    {
    }

    public static function fromArray(array $data): ToolCall
    {
        return new self(
            id: $data['id'],
            function: ToolCallFunction::fromArray($data['function']),
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'function' => $this->function->toArray(),
        ];
    }
}
