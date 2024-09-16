<?php

namespace KrZar\LaravelOpenAiApi\Embeddings\ValueObjects;

enum EmbeddingsModel: string
{
    case TEXT_EMBEDDING_3_LARGE = 'text-embedding-3-large';
    case TEXT_EMBEDDING_3_SMALL = 'text-embedding-3-small';
    case TEXT_EMBEDDING_ADA_002 = 'text-embedding-ada-002';
}
