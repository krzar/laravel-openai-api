<?php

namespace KrZar\LaravelOpenAiApi\Audio\Collections\Verbose;

use Illuminate\Support\Collection;
use KrZar\LaravelOpenAiApi\Audio\Dto\Verbose\Segment;

class SegmentsCollection extends Collection
{
    public static function fromArray(array $segments): SegmentsCollection
    {
        $collection = new SegmentsCollection();

        foreach ($segments as $segment) {
            $collection->add(Segment::fromArray($segment));
        }

        return $collection;
    }

    public function add($item): SegmentsCollection
    {
        if (!$item instanceof Segment) {
            throw new \InvalidArgumentException('Item must be an instance of Segment');
        }

        return parent::add($item);
    }
}
