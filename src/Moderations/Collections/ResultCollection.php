<?php

namespace KrZar\LaravelOpenAiApi\Moderations\Collections;

use Illuminate\Support\Collection;
use KrZar\LaravelOpenAiApi\Moderations\DTO\Result\Result;

class ResultCollection extends Collection
{
    public static function fromArray(array $array): self
    {
        $collection = new self();

        foreach ($array as $item) {
            $collection->add(Result::fromArray($item));
        }

        return $collection;
    }

    public function add($item): ResultCollection
    {
        if (!$item instanceof Result) {
            throw new \InvalidArgumentException('Item must be an instance of Result');
        }

        return parent::add($item);
    }
}
