<?php

namespace KrZar\LaravelOpenAiApi\Images\ValueObjects\ImageSize;

enum DallE2ImageSize: string
{
    case S256x256 = '256x256';
    case S512x512 = '512x512';
    case S1024x1024 = '1024x1024';
}
