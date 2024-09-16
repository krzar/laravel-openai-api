<?php

namespace KrZar\LaravelOpenAiApi\Chat\ValueObjects\Message\Types;

use KrZar\LaravelOpenAiApi\Chat\ValueObjects\Message\Role\MessageRole;

class UserMessage extends ChatMessage
{
    public function __construct(
        public string|array $content,
        public ?string $name = null,
    )
    {
        $this->role = MessageRole::USER;
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
