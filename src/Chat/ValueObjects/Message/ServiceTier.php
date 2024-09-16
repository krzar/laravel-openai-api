<?php

namespace KrZar\LaravelOpenAiApi\Chat\ValueObjects\Message;

enum ServiceTier: string
{
    case AUTO = 'auto';
    case DEFAULT = 'default';
}
