<?php

namespace KrZar\LaravelOpenAiApi\Chat\Collections\Choice;

use Illuminate\Support\Collection;
use KrZar\LaravelOpenAiApi\Chat\DTO\Choice\Choice;

class ChoiceCollection extends Collection
{

    public static function fromArray(array $value): ChoiceCollection
    {
        $collection = new self();

        foreach ($value as $item) {
            $collection->add(Choice::fromArray($item));
        }

        return $collection;
    }

    public function add($item): ChoiceCollection
    {
        if (!$item instanceof Choice) {
            throw new \InvalidArgumentException('Item must be an instance of Choice');
        }

        return parent::add($item);
    }
}
