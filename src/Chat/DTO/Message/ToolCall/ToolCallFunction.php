<?php

namespace KrZar\LaravelOpenAiApi\Chat\DTO\Message\ToolCall;

readonly class ToolCallFunction
{
    public function __construct(
        public string $name,
        public array $arguments,
    )
    {
    }

    public static function fromArray(array $data): ToolCallFunction
    {
        return new self(
            name: $data['name'],
            arguments: $data['arguments'],
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'arguments' => $this->arguments,
        ];
    }
}
