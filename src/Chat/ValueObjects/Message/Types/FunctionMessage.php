<?php

namespace KrZar\LaravelOpenAiApi\Chat\ValueObjects\Message\Types;

use KrZar\LaravelOpenAiApi\Chat\ValueObjects\Message\Role\MessageRole;

class FunctionMessage extends ChatMessage
{
    public function __construct(
        public ?string $content,
        public string $name,
    )
    {
        $this->role = MessageRole::FUNCTION;
    }

    public function toArray(): array
    {
        return [
            'role' => $this->role,
            'content' => $this->content,
            'name' => $this->name,
        ];
    }
}
