<?php

namespace KrZar\LaravelOpenAiApi\Uploads\Responses;

use Illuminate\Support\Carbon;
use KrZar\ArrayDto\ArrayDto;
use KrZar\ArrayDto\Casts\ClosureCast;
use KrZar\ArrayDto\Casts\NameCast;

class UploadPartResponse extends ArrayDto
{
    public string $id;
    public string $object;
    public Carbon $createdAt;
    public string $uploadId;

    protected function casts(): array
    {
        return [
            'createdAt' => [
                new NameCast('created_at'),
                new ClosureCast(fn(int $value) => Carbon::createFromTimestamp($value))
            ],
            'uploadId' => new NameCast('upload_id'),
        ];
    }
}
