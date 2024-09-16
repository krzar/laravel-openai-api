<?php

namespace KrZar\LaravelOpenAiApi\Batch\ValueObjects;

enum BatchEndpoint: string
{
    case CHAT_COMPLETIONS = '/v1/chat/completions';
    case EMBEDDINGS = '/v1/embeddings';
}
