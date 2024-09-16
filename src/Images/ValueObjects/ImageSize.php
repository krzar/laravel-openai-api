<?php

namespace KrZar\LaravelOpenAiApi\Images\ValueObjects;

enum ImageSize: string
{
    case S256x256 = '256x256';
    case S512x512 = '512x512';
    case S1024x1024 = '1024x1024';
    case S1792x1024 = '1792x1024';
    case S1024x1792 = '1024x1792';
}
