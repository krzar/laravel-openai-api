<?php

namespace KrZar\LaravelOpenAiApi\Uploads\Responses\DTO;

use Illuminate\Support\Carbon;
use KrZar\ArrayDto\ArrayDto;
use KrZar\ArrayDto\Casts\ClosureCast;
use KrZar\ArrayDto\Casts\NameCast;
use KrZar\LaravelOpenAiApi\Base\ValueObjects\Purpose;

class UploadFile extends ArrayDto
{
    public string $id;
    public string $object;
    public int $bytes;
    public Carbon $createdAt;
    public string $filename;
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
