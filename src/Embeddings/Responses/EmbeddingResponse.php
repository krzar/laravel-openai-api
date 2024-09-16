<?php

namespace KrZar\LaravelOpenAiApi\Embeddings\Responses;

use KrZar\ArrayDto\ArrayDto;

class EmbeddingResponse extends ArrayDto
{
    public int $index;
    public array $embedding;
    public string $object;
}
