<?php

namespace KrZar\LaravelOpenAiApi\Chat\Collections\LogProbs;

use Illuminate\Support\Collection;
use KrZar\LaravelOpenAiApi\Chat\DTO\LogProbs\LogProbsItem;

class LogProbsItemCollection extends Collection
{
    public static function fromArray(array $items): LogProbsItemCollection
    {
        $collection = new self();

        foreach ($items as $item) {
            $collection->add(LogProbsItem::fromArray($item));
        }

        return $collection;
    }

    public function add($item): LogProbsItemCollection
    {
        if (!$item instanceof LogProbsItem) {
            throw new \InvalidArgumentException('Item must be an instance of LogProbsItem');
        }

        return parent::add($item);
    }
}
