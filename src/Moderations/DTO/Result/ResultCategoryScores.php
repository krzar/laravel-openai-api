<?php

namespace KrZar\LaravelOpenAiApi\Moderations\DTO\Result;

readonly class ResultCategoryScores
{
    public function __construct(
        public float $sexual,
        public float $hate,
        public float $harassment,
        public float $selfHarm,
        public float $sexualMinors,
        public float $hateThreatening,
        public float $violenceGraphic,
        public float $selfHarmIntent,
        public float $selfHarmInstructions,
        public float $harassmentThreatening,
        public float $violence,
    )
    {
    }

    public static function fromArray(array $data): ResultCategoryScores
    {
        return new self(
            sexual: $data['sexual'],
            hate: $data['hate'],
            harassment: $data['harassment'],
            selfHarm: $data['self-harm'],
            sexualMinors: $data['sexual/minors'],
            hateThreatening: $data['hate/threatening'],
            violenceGraphic: $data['violence/graphic'],
            selfHarmIntent: $data['self-harm/intent'],
            selfHarmInstructions: $data['self-harm/instructions'],
            harassmentThreatening: $data['harassment/threatening'],
            violence: $data['violence'],
        );
    }
}
