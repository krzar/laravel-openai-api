<?php

namespace KrZar\LaravelOpenAiApi\Chat\ValueObjects\Message\Types;

use KrZar\LaravelOpenAiApi\Chat\ValueObjects\Message\Role\MessageRole;

class ToolMessage extends ChatMessage
{
    public function __construct(
        public string|array $content,
        public string $toolCallId,
    )
    {
        $this->role = MessageRole::TOOL;
    }

    public function toArray(): array
    {
        return [
            'role' => $this->role,
            'content' => $this->content,
            'tool_call_id' => $this->toolCallId,
        ];
    }
}
