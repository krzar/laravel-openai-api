<?php

namespace KrZar\LaravelOpenAiApi\Chat\ValueObjects\Message\Types;

use InvalidArgumentException;
use KrZar\LaravelOpenAiApi\Chat\Collections\Message\Calls\ToolCall\ToolCallsCollection;
use KrZar\LaravelOpenAiApi\Chat\ValueObjects\Message\Role\MessageRole;

abstract class ChatMessage
{
    public MessageRole $role;

    public static function fromArray(array $data): ChatMessage
    {
        $role = MessageRole::from($data['role']);

        switch ($role) {
            case MessageRole::USER:
                return new UserMessage(
                    content: $data['content'],
                    name: $data['name'] ?? null,
                );
            case MessageRole::SYSTEM:
                return new SystemMessage(
                    content: $data['content'],
                    name: $data['name'] ?? null,
                );
            case MessageRole::TOOL:
                return new ToolMessage(
                    content: $data['content'],
                    toolCallId: $data['tool_call_id'],
                );
            case MessageRole::FUNCTION:
                return new FunctionMessage(
                    content: $data['content'],
                    name: $data['name'],
                );
            case MessageRole::ASSISTANT:
                return new AssistantMessage(
                    content: $data['content'],
                    refusal: $data['refusal'],
                    name: $data['name'] ?? null,
                    toolCalls: isset($data['tool_calls']) ? ToolCallsCollection::fromArray($data['tool_calls']) : null,
                );
        }

        throw new InvalidArgumentException('Invalid message role');
    }

    public abstract function toArray(): array;

    public function isAssistant(): bool
    {
        return $this->role === MessageRole::ASSISTANT;
    }

    public function isUser(): bool
    {
        return $this->role === MessageRole::USER;
    }

    public function isSystem(): bool
    {
        return $this->role === MessageRole::SYSTEM;
    }

    public function isFunction(): bool
    {
        return $this->role === MessageRole::FUNCTION;
    }

    public function isTool(): bool
    {
        return $this->role === MessageRole::TOOL;
    }
}
