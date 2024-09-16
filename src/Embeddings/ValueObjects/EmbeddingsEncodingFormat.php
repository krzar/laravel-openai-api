<?php

namespace KrZar\LaravelOpenAiApi\Embeddings\ValueObjects;

enum EmbeddingsEncodingFormat: string
{
    case FLOAT = 'float';
    case BASE64 = 'base64';
}
