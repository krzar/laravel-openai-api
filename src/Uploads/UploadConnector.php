<?php

namespace KrZar\LaravelOpenAiApi\Uploads;

use Illuminate\Http\File;
use KrZar\LaravelOpenAiApi\Base\DTO\RequestFileAttach;
use KrZar\LaravelOpenAiApi\Base\OpenAiConnector;
use KrZar\LaravelOpenAiApi\Base\ValueObjects\ApiVersion;
use KrZar\LaravelOpenAiApi\Base\ValueObjects\Purpose;
use KrZar\LaravelOpenAiApi\Uploads\Responses\UploadPartResponse;
use KrZar\LaravelOpenAiApi\Uploads\Responses\UploadResponse;

class UploadConnector extends OpenAiConnector
{
    public function createUpload(
        string $filename,
        Purpose $purpose,
        int $bytes,
        string $mimeType,
    ): UploadResponse
    {
        $response = $this->post(
            ApiVersion::V1,
            'uploads',
            [
                'filename' => $filename,
                'purpose' => $purpose->value,
                'bytes' => $bytes,
                'mime_type' => $mimeType,
            ]
        )->json();

        return UploadResponse::create($response);
    }

    public function addUploadPart(
        string $uploadId,
        File $file,
    ): UploadPartResponse
    {
        $fileAttach = new RequestFileAttach(
            'data',
            $file,
        );

        $response = $this->post(
            ApiVersion::V1,
            "uploads/$uploadId/parts",
            [],
            $fileAttach
        )->json();

        return UploadPartResponse::create($response);
    }

    public function completeUpload(
        string $uploadId,
        array $partIds,
        ?string $md5 = null,
    ): UploadResponse
    {
        $response = $this->post(
            ApiVersion::V1,
            "uploads/$uploadId/complete",
            [
                'part_ids' => $partIds,
                'md5' => $md5,
            ]
        )->json();

        return UploadResponse::create($response);
    }

    public function cancelUpload(string $uploadId): UploadResponse
    {
        $response = $this->post(
            ApiVersion::V1,
            "uploads/$uploadId/cancel"
        )->json();

        return UploadResponse::create($response);
    }
}
