<?php

namespace KrZar\LaravelOpenAiApi\Images\Collections;

use Illuminate\Support\Collection;
use KrZar\LaravelOpenAiApi\Images\DTO\Image;

class ImageCollection extends Collection
{
    public static function fromArray(array $images): ImageCollection
    {
        $collection = new self();

        foreach ($images as $image) {
            $collection->add(Image::fromArray($image));
        }

        return $collection;
    }

    public function add($item): ImageCollection
    {
        if (!$item instanceof Image) {
            throw new \InvalidArgumentException('Item must be an instance of Image');
        }

        return parent::add($item);
    }
}
