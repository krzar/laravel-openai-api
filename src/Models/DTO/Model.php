<?php

namespace KrZar\LaravelOpenAiApi\Models\DTO;

use Illuminate\Support\Carbon;

readonly class Model
{
    public function __construct(
        public string $id,
        public string $object,
        public Carbon $created,
        public string $ownedBy,
    )
    {
    }

    public static function fromArray(array $data): Model
    {
        return new self(
            id: $data['id'],
            object: $data['object'],
            created: Carbon::createFromTimestamp($data['created']),
            ownedBy: $data['owned_by'],
        );
    }
}
