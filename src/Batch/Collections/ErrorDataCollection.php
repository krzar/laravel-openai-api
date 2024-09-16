<?php

namespace KrZar\LaravelOpenAiApi\Batch\Collections;

use Illuminate\Support\Collection;
use KrZar\LaravelOpenAiApi\Batch\DTO\Errors\ErrorData;

class ErrorDataCollection extends Collection
{
    public static function fromArray(array $errorsData): ErrorDataCollection
    {
        $collection = new self();

        foreach ($errorsData as $errorData) {
            $collection->add(ErrorData::fromArray($errorData));
        }

        return $collection;
    }

    public function add($item): ErrorDataCollection
    {
        if (!$item instanceof ErrorData) {
            throw new \InvalidArgumentException('Item must be an instance of ErrorData');
        }

        return parent::add($item);
    }
}
