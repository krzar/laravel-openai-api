<?php

namespace KrZar\LaravelOpenAiApi\FineTuning\Collections;

use Illuminate\Support\Collection;
use KrZar\LaravelOpenAiApi\FineTuning\DTO\Integrations\Integration;

class IntegrationsCollection extends Collection
{
    public static function fromArray(array $integrations): IntegrationsCollection
    {
        $collection = new self();

        foreach ($integrations as $integration) {
            $collection->add(Integration::fromArray($integration));
        }

        return $collection;
    }

    public function add($item): IntegrationsCollection
    {
        if (!$item instanceof Integration) {
            throw new \InvalidArgumentException('Item must be an instance of Integration');
        }

        return parent::add($item);
    }
}
