<?php

namespace KrZar\LaravelOpenAiApi\FineTuning\ValueObjects\Status;

enum JobStatus: string
{
    case VALIDATING_FILES = 'validating_files';
    case QUEUED = 'queued';
    case RUNNING = 'running';
    case SUCCEEDED = 'succeeded';
    case FAILED = 'failed';
    case CANCELLED = 'cancelled';
}
