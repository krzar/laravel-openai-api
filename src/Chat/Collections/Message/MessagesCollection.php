<?php

namespace KrZar\LaravelOpenAiApi\Chat\Collections\Message;

use Illuminate\Support\Collection;
use KrZar\LaravelOpenAiApi\Chat\ValueObjects\Message\Types\ChatMessage;

class MessagesCollection extends Collection
{
    public function fromArray(array $chatMessages): MessagesCollection
    {
        $collection = new MessagesCollection();

        foreach ($chatMessages as $chatMessage) {
            $collection->add(ChatMessage::fromArray($chatMessage));
        }

        return $collection;
    }

    public function add($item): MessagesCollection
    {
        if (!$item instanceof ChatMessage) {
            throw new \InvalidArgumentException('Item must be an instance of ChatMessage');
        }

        return parent::add($item);
    }
}
