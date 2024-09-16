<?php

namespace KrZar\LaravelOpenAiApi\Batch\Responses;

use Illuminate\Support\Carbon;
use KrZar\ArrayDto\ArrayDto;
use KrZar\ArrayDto\Casts\ClosureCast;
use KrZar\ArrayDto\Casts\NameCast;
use KrZar\LaravelOpenAiApi\Batch\DTO\Errors\ErrorsList;
use KrZar\LaravelOpenAiApi\Batch\DTO\RequestCounts;
use KrZar\LaravelOpenAiApi\Batch\ValueObjects\BatchEndpoint;

class BatchResponse extends ArrayDto
{
    public string $id;
    public string $object;
    public BatchEndpoint $endpoint;
    public ErrorsList $errors;
    public string $inputFileId;
    public string $completionWindow;
    public string $status;
    public string $outputFileId;
    public string $errorFileId;
    public Carbon $createdAt;
    public Carbon $inProgressAt;
    public Carbon $expiresAt;
    public Carbon $finalizingAt;
    public Carbon $completedAt;
    public Carbon $failedAt;
    public Carbon $expiredAt;
    public Carbon $cancellingAt;
    public Carbon $cancelledAt;
    public RequestCounts $requestCounts;
    public array $metadata;

    protected function casts(): array
    {
        return [
            'errors' => new ClosureCast(fn(array $value) => ErrorsList::fromArray($value)),
            'inputFileId' => new NameCast('input_file_id'),
            'completionWindow' => new NameCast('completion_window'),
            'outputFileId' => new NameCast('output_file_id'),
            'errorFileId' => new NameCast('error_file_id'),
            'createdAt' => [
                new NameCast('created_at'),
                new ClosureCast(fn(int $value) => Carbon::createFromTimestamp($value))
            ],
            'inProgressAt' => [
                new NameCast('in_progress_at'),
                new ClosureCast(fn(int $value) => Carbon::createFromTimestamp($value))
            ],
            'expiresAt' => [
                new NameCast('expires_at'),
                new ClosureCast(fn(int $value) => Carbon::createFromTimestamp($value))
            ],
            'finalizingAt' => [
                new NameCast('finalizing_at'),
                new ClosureCast(fn(int $value) => Carbon::createFromTimestamp($value))
            ],
            'completedAt' => [
                new NameCast('completed_at'),
                new ClosureCast(fn(int $value) => Carbon::createFromTimestamp($value))
            ],
            'failedAt' => [
                new NameCast('failed_at'),
                new ClosureCast(fn(int $value) => Carbon::createFromTimestamp($value))
            ],
            'expiredAt' => [
                new NameCast('expired_at'),
                new ClosureCast(fn(int $value) => Carbon::createFromTimestamp($value))
            ],
            'cancellingAt' => [
                new NameCast('cancelling_at'),
                new ClosureCast(fn(int $value) => Carbon::createFromTimestamp($value))
            ],
            'cancelledAt' => [
                new NameCast('cancelled_at'),
                new ClosureCast(fn(int $value) => Carbon::createFromTimestamp($value))
            ],
            'requestCounts' => new ClosureCast(fn(array $value) => RequestCounts::fromArray($value)),
        ];
    }
}
