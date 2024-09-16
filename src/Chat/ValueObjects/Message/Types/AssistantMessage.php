<?php

namespace KrZar\LaravelOpenAiApi\Chat\ValueObjects\Message\Types;

use KrZar\LaravelOpenAiApi\Chat\Collections\Message\Calls\ToolCall\ToolCallsCollection;
use KrZar\LaravelOpenAiApi\Chat\DTO\Message\ToolCall\ToolCall;
use KrZar\LaravelOpenAiApi\Chat\ValueObjects\Message\Role\MessageRole;

class AssistantMessage extends ChatMessage
{
    public function __construct(
        public string|array $content,
        public ?string $refusal = null,
        public ?string $name = null,
        public ?ToolCallsCollection $toolCalls = null,
    )
    {
        $this->role = MessageRole::ASSISTANT;
    }

    public function toArray(): array
    {
        return [
            'role' => $this->role,
            'content' => $this->content,
            'refusal' => $this->refusal,
            'name' => $this->name,
            'tool_calls' => $this->toolCalls?->map(
                fn(ToolCall $toolCall) => $toolCall->toArray()
            )->toArray(),
        ];
    }
}
