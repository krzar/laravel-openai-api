<?php

namespace KrZar\LaravelOpenAiApi\Chat\Collections\Message\Calls\ToolCall;

use Illuminate\Support\Collection;
use KrZar\LaravelOpenAiApi\Chat\DTO\Message\ToolCall\ToolCall;

class ToolCallsCollection extends Collection
{
    public static function fromArray(array $toolCalls): ToolCallsCollection
    {
        $collection = new self();

        foreach ($toolCalls as $toolCall) {
            $collection->add(ToolCall::fromArray($toolCall));
        }

        return $collection;
    }

    public function add($item): ToolCallsCollection
    {
        if (!$item instanceof ToolCall) {
            throw new \InvalidArgumentException('Item must be an instance of ToolCall');
        }

        return parent::add($item);
    }
}
