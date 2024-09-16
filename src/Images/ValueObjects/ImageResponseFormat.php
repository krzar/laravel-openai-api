<?php

namespace KrZar\LaravelOpenAiApi\Images\ValueObjects;

enum ImageResponseFormat: string
{
    case URL = 'url';
    case BASE64_JSON = 'b64_json';
}
