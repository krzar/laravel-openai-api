<?php

namespace KrZar\LaravelOpenAiApi\Images\ValueObjects\ImageSize;

enum DallE3ImageSize: string
{
    case S1024x1024 = '1024x1024';
    case S1792x1024 = '1792x1024';
    case S1024x1792 = '1024x1792';
}
