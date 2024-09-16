<?php

namespace KrZar\LaravelOpenAiApi\Audio\Responses;

use KrZar\ArrayDto\Casts\ClosureCast;
use KrZar\LaravelOpenAiApi\Audio\Collections\Verbose\SegmentsCollection;
use KrZar\LaravelOpenAiApi\Audio\Collections\Verbose\WordsCollection;

class AudioTranscriptionVerboseResponse extends AudioTextResponse
{
    public string $language;
    public float $duration;
    public WordsCollection $words;
    public SegmentsCollection $segments;

    protected function casts(): array
    {
        return [
            'words' => new ClosureCast(fn(array $value) => WordsCollection::fromArray($value)),
            'segments' => new ClosureCast(fn(array $value) => SegmentsCollection::fromArray($value)),
        ];
    }
}
