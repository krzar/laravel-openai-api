<?php

namespace KrZar\LaravelOpenAiApi\Audio\ValueObjects;

enum AudioVoice: string
{
    case ALLOY = 'alloy';
    case ECHO = 'echo';
    case FABLE = 'fable';
    case ONYX = 'onyx';
    case NOVA = 'nova';
    case SHIMMER = 'shimmer';
}
