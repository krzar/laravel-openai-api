<?php

namespace KrZar\LaravelOpenAiApi\Audio\Collections\Verbose;

use Illuminate\Support\Collection;
use KrZar\LaravelOpenAiApi\Audio\Dto\Verbose\Word;

class WordsCollection extends Collection
{

    public static function fromArray(array $words): WordsCollection
    {
        $collection = new WordsCollection();

        foreach ($words as $word) {
            $collection->add(Word::fromArray($word));
        }

        return $collection;
    }

    public function add($item): WordsCollection
    {
        if (!$item instanceof Word) {
            throw new \InvalidArgumentException('Item must be an instance of Word');
        }

        return parent::add($item);
    }
}
