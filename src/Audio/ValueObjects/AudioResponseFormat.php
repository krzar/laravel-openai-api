<?php

namespace KrZar\LaravelOpenAiApi\Audio\ValueObjects;

enum AudioResponseFormat: string
{
    case MP3 = 'mp3';
    case OPUS = 'opus';
    case AAC = 'aac';
    case FLAC = 'flac';
    case WAV = 'wav';
    case PCM = 'pcm';
}
