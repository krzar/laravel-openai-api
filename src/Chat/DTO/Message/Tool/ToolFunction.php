<?php

namespace KrZar\LaravelOpenAiApi\Chat\DTO\Message\Tool;

readonly class ToolFunction
{
    public function __construct(
        public string $name,
        public ?string $description = null,
        public ?array $parameters = null,
        public ?bool $strict = null,
    )
    {
    }

    public static function fromArray(array $data): ToolFunction
    {
        return new self(
            name: $data['name'],
            description: $data['description'] ?? null,
            parameters: $data['parameters'] ?? null,
            strict: $data['strict'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'parameters' => $this->parameters,
            'strict' => $this->strict,
        ];
    }
}
