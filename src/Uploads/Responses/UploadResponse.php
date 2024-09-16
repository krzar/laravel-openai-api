<?php

namespace KrZar\LaravelOpenAiApi\Uploads\Responses;

use Illuminate\Support\Carbon;
use KrZar\ArrayDto\ArrayDto;
use KrZar\ArrayDto\Casts\ClosureCast;
use KrZar\ArrayDto\Casts\NameCast;
use KrZar\LaravelOpenAiApi\Base\ValueObjects\Purpose;
use KrZar\LaravelOpenAiApi\Uploads\Responses\DTO\UploadFile;

class UploadResponse extends ArrayDto
{
    public string $id;
    public Carbon $createdAt;
    public string $filename;
    public int $bytes;
    public Purpose $purpose;
    public string $status;
    public Carbon $expiresAt;
    public string $object;
    public UploadFile $file;

    protected function casts(): array
    {
        return [
            'createdAt' => [
                new NameCast('created_at'),
                new ClosureCast(fn(int $value) => Carbon::createFromTimestamp($value))
            ],
            'purpose' => new ClosureCast(fn(string $value) => Purpose::from($value)),
            'expiresAt' => [
                new NameCast('expires_at'),
                new ClosureCast(fn(int $value) => Carbon::createFromTimestamp($value))
            ],
        ];
    }
}
