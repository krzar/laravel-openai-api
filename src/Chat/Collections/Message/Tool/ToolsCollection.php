<?php

namespace KrZar\LaravelOpenAiApi\Chat\Collections\Message\Tool;

use Illuminate\Support\Collection;
use KrZar\LaravelOpenAiApi\Chat\DTO\Message\Tool\Tool;

class ToolsCollection extends Collection
{
    public static function fromArray(array $tools): ToolsCollection
    {
        $collection = new self();

        foreach ($tools as $tool) {
            $collection->add(Tool::fromArray($tool));
        }

        return $collection;
    }

    public function add($item): ToolsCollection
    {
        if (!$item instanceof Tool) {
            throw new \InvalidArgumentException('Item must be an instance of Tool');
        }

        return parent::add($item);
    }
}
