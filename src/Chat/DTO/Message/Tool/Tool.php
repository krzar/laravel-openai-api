<?php

namespace KrZar\LaravelOpenAiApi\Chat\DTO\Message\Tool;

readonly class Tool
{
    public function __construct(
        public ToolFunction $function,
    )
    {
    }

    public static function fromArray(array $data): Tool
    {
        return new self(
            function: ToolFunction::fromArray($data['function'])
        );
    }

    public function toArray(): array
    {
        return [
            'function' => $this->function->toArray(),
        ];
    }
}
