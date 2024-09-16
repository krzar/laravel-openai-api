<?php

namespace KrZar\LaravelOpenAiApi\Batch\Responses;

use KrZar\ArrayDto\Casts\ClosureCast;
use KrZar\LaravelOpenAiApi\Base\Responses\ListResponse;

class BatchListResponse extends ListResponse
{
    protected function casts(): array
    {
        return [
            ...parent::casts(),
            'data' => new ClosureCast(
                fn(array $value) => collect($value)->map(fn(array $item) => BatchResponse::create($item))
            ),
        ];
    }
}