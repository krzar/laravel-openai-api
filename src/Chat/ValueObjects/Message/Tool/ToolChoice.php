<?php

namespace KrZar\LaravelOpenAiApi\Chat\ValueObjects\Message\Tool;

enum ToolChoice: string
{
    case NONE = 'none';
    case AUTO = 'auto';
    case REQUIRED = 'required';
}
