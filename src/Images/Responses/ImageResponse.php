<?php

namespace KrZar\LaravelOpenAiApi\Images\Responses;

use Illuminate\Support\Carbon;
use KrZar\ArrayDto\ArrayDto;
use KrZar\ArrayDto\Casts\ClosureCast;
use KrZar\LaravelOpenAiApi\Images\Collections\ImageCollection;

class ImageResponse extends ArrayDto
{
    public Carbon $created;
    public ImageCollection $data;

    protected function casts(): array
    {
        return [
            'created' => new ClosureCast(fn (int $value) => Carbon::createFromTimestamp($value)),
            'data' => new ClosureCast(fn (array $value) => ImageCollection::fromArray($value)),
        ];
    }
}
