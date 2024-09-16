<?php

namespace KrZar\LaravelOpenAiApi\Base\DTO;

use Illuminate\Http\File;

class RequestFileAttach
{
    public function __construct(
        public string $key,
        public File $file
    )
    {
    }
}
