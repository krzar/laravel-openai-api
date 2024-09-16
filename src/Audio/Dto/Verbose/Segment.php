<?php

namespace KrZar\LaravelOpenAiApi\Audio\Dto\Verbose;

readonly class Segment
{
    public function __construct(
        public int $id,
        public int $seek,
        public float $start,
        public float $end,
        public string $text,
        public array $tokens,
        public float $temperature,
        public float $avgLogProb,
        public float $compressionRatio,
        public float $noSpeechProb,
    )
    {
    }

    public static function fromArray(array $data): Segment
    {
        return new Segment(
            id: $data['id'],
            seek: $data['seek'],
            start: $data['start'],
            end: $data['end'],
            text: $data['text'],
            tokens: $data['tokens'],
            temperature: $data['temperature'],
            avgLogProb: $data['avg_logprob'],
            compressionRatio: $data['compression_ratio'],
            noSpeechProb: $data['no_speech_prob'],
        );
    }
}
