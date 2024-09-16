<?php

namespace KrZar\LaravelOpenAiApi\Images\ValueObjects;

enum ImageModel: string
{
    case DALL_E_2 = 'dall-e-2';
    case DALL_E_3 = 'dall-e-3';
}
