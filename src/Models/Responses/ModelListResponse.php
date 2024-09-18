<?php

namespace KrZar\LaravelOpenAiApi\Models\Responses;

use Illuminate\Support\Collection;
use KrZar\ArrayDto\ArrayDto;
use KrZar\ArrayDto\Casts\ClosureCast;

class ModelListResponse extends ArrayDto
{
    public string $object;
    public Collection $data;

    protected function casts(): array
    {
        return [
            'data' => new ClosureCast(
                fn(array $value) => collect($value)->map(fn(array $item) => ModelResponse::create($item))
            ),
        ];
    }
}
