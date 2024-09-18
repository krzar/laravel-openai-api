<?php

namespace KrZar\LaravelOpenAiApi\Moderations\ValueObjects;

enum ModerationModel: string
{
    case TEXT_MODERATION_STABLE = 'text-moderation-stable';
    case TEXT_MODERATION_LATEST = 'text-moderation-latest';
}
