<?php

namespace KrZar\LaravelOpenAiApi\FineTuning\Responses;

use Illuminate\Support\Collection;
use KrZar\ArrayDto\ArrayDto;
use KrZar\ArrayDto\Casts\ClosureCast;
use KrZar\ArrayDto\Casts\NameCast;

class FineTuningJobsListResponse extends ArrayDto
{
    public string $object;
    public Collection $data;
    public bool $hasMore;

    protected function casts(): array
    {
        return [
            'data' => new ClosureCast(
                fn(array $value) => collect($value)->map(fn(array $item) => FineTuningJobResponse::create($item))
            ),
            'hasMore' => new NameCast('has_more'),
        ];
    }
}
