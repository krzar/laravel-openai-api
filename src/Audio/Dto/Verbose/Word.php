<?php

namespace KrZar\LaravelOpenAiApi\Audio\Dto\Verbose;

readonly class Word
{
    public function __construct(
        public string $word,
        public float $start,
        public float $end,
    )
    {
    }

    public static function fromArray(array $data): Word
    {
        return new Word(
            word: $data['word'],
            start: $data['start'],
            end: $data['end'],
        );
    }
}
