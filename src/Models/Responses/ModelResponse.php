<?php

namespace KrZar\LaravelOpenAiApi\Models\Responses;

use Illuminate\Support\Carbon;
use KrZar\ArrayDto\ArrayDto;
use KrZar\ArrayDto\Casts\ClosureCast;
use KrZar\ArrayDto\Casts\NameCast;

class ModelResponse extends ArrayDto
{
    public string $id;
    public string $object;
    public Carbon $created;
    public string $ownedBy;

    protected function casts(): array
    {
        return [
            'created' => new ClosureCast(fn (int $value) => Carbon::createFromTimestamp($value)),
            'ownedBy' => new NameCast('owned_by'),
        ];
    }
}
