<?php

namespace KrZar\LaravelOpenAiApi\Images\ValueObjects;

enum ImageQuality: string
{
    case STANDARD = 'standard';
    case HD = 'hd';
}
