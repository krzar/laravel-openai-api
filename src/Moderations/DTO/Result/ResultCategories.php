<?php

namespace KrZar\LaravelOpenAiApi\Moderations\DTO\Result;

readonly class ResultCategories
{
    public function __construct(
        public bool $sexual,
        public bool $hate,
        public bool $harassment,
        public bool $selfHarm,
        public bool $sexualMinors,
        public bool $hateThreatening,
        public bool $violenceGraphic,
        public bool $selfHarmIntent,
        public bool $selfHarmInstructions,
        public bool $harassmentThreatening,
        public bool $violence,
    )
    {
    }

    public static function fromArray(array $data): ResultCategories
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
