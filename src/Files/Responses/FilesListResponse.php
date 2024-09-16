<?php

namespace KrZar\LaravelOpenAiApi\Files\Responses;

use Illuminate\Support\Collection;
use KrZar\ArrayDto\ArrayDto;
use KrZar\ArrayDto\Casts\ClosureCast;

class FilesListResponse extends ArrayDto
{
    public Collection $data;

    protected function casts(): array
    {
        return [
            'data' => new ClosureCast(
                fn(array $value) => collect($value)->map(fn(array $item) => FileResponse::create($item))
            ),
        ];
    }
}
