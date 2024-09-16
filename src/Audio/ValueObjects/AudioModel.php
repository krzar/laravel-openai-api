<?php

namespace KrZar\LaravelOpenAiApi\Audio\ValueObjects;

enum AudioModel: string
{
    case TTS1 = 'tts-1';
    case TTS1_HD = 'tts-1-hd';
}
