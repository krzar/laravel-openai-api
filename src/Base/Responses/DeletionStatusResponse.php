<?php

namespace KrZar\LaravelOpenAiApi\Base\Responses;

use KrZar\ArrayDto\ArrayDto;

class DeletionStatusResponse extends ArrayDto
{
    public string $id;
    public string $object;
    public bool $deleted;
}
