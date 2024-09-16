<?php

namespace KrZar\LaravelOpenAiApi\Chat\ValueObjects\Message\Types;

use KrZar\LaravelOpenAiApi\Chat\ValueObjects\Message\Role\MessageRole;

class SystemMessage extends ChatMessage
{
    public function __construct(
        public string|array $content,
        public ?string $name = null,
    )
    {
        $this->role = MessageRole::SYSTEM;
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
