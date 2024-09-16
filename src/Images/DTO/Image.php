<?php

namespace KrZar\LaravelOpenAiApi\Images\DTO;

readonly class Image
{
    public function __construct(
        public string $revisedPrompt,
        public ?string $base64Json = null,
        public ?string $url = null,
    )
    {
    }

    public static function fromArray(array $data): Image
    {
        return new self(
            revisedPrompt: $data['revisedPrompt'],
            base64Json: $data['base64Json'] ?? null,
            url: $data['url'] ?? null,
        );
    }
}
