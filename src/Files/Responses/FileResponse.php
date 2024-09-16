<?php

namespace KrZar\LaravelOpenAiApi\Files\Responses;

use Illuminate\Support\Carbon;
use KrZar\ArrayDto\ArrayDto;
use KrZar\ArrayDto\Casts\ClosureCast;
use KrZar\ArrayDto\Casts\NameCast;
use KrZar\LaravelOpenAiApi\Files\ValueObjects\Purpose;

class FileResponse extends ArrayDto
{
    public string $id;
    public int $bytes;
    public string $createdAt;
    public string $filename;
    public string $object;
    public Purpose $purpose;

    protected function casts(): array
    {
        return [
            'createdAt' => [
                new NameCast('created_at'),
                new ClosureCast(fn(int $value) => Carbon::createFromTimestamp($value))
            ],
            'purpose' => new ClosureCast(fn(string $value) => Purpose::from($value)),
        ];
    }
}
