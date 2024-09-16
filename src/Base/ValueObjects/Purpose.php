<?php

namespace KrZar\LaravelOpenAiApi\Base\ValueObjects;

enum Purpose: string
{
    case ASSISTANTS = 'assistants';
    case VISION = 'vision';
    case BATCH = 'batch';
    case FINE_TUNE = 'fine-tune';
}
