<?php

namespace KrZar\LaravelOpenAiApi\Chat\ValueObjects\Message\Role;

enum MessageRole: string
{
    case SYSTEM = 'system';
    case USER = 'user';
    case ASSISTANT = 'assistant';
    case TOOL = 'tool';
    case FUNCTION = 'function';
}
