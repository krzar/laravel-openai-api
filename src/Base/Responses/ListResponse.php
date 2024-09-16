<?php

namespace KrZar\LaravelOpenAiApi\Base\Responses;

use Illuminate\Support\Collection;
use KrZar\ArrayDto\ArrayDto;
use KrZar\ArrayDto\Casts\NameCast;

class ListResponse extends ArrayDto
{
    public ?string $object;
    public Collection $data;
    public bool $hasMore;
    public ?string $firstId = null;
    public ?string $lastId = null;

    protected function casts(): array
    {
        return [
            'hasMore' => new NameCast('has_more'),
            'firstId' => new NameCast('first_id'),
            'lastId' => new NameCast('last_id'),
        ];
    }
}
