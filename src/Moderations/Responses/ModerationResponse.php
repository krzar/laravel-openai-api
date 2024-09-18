<?php

namespace KrZar\LaravelOpenAiApi\Moderations\Responses;

use KrZar\ArrayDto\ArrayDto;
use KrZar\ArrayDto\Casts\ClosureCast;
use KrZar\LaravelOpenAiApi\Moderations\Collections\ResultCollection;
use KrZar\LaravelOpenAiApi\Moderations\ValueObjects\ModerationModel;

class ModerationResponse extends ArrayDto
{
    public string $id;
    public ModerationModel $model;
    public ResultCollection $results;

    protected function casts(): array
    {
        return [
            'model' => new ClosureCast(fn(string $value) => ModerationModel::from($value)),
            'results' => new ClosureCast(fn(array $value) => ResultCollection::fromArray($value)),
        ];
    }
}
