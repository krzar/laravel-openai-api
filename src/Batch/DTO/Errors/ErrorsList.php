<?php

namespace KrZar\LaravelOpenAiApi\Batch\DTO\Errors;

use KrZar\LaravelOpenAiApi\Batch\Collections\ErrorDataCollection;

readonly class ErrorsList
{
    public function __construct(
        public string    $object,
        public ErrorDataCollection $data,
    )
    {
    }

    public static function fromArray(array $data): ErrorsList
    {
        return new self(
            object: $data['object'],
            data: ErrorDataCollection::fromArray($data['data'])
        );
    }
}
