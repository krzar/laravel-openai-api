<?php

namespace KrZar\LaravelOpenAiApi\Files;

use Illuminate\Http\File;
use KrZar\LaravelOpenAiApi\Base\DTO\RequestFileAttach;
use KrZar\LaravelOpenAiApi\Base\OpenAiConnector;
use KrZar\LaravelOpenAiApi\Base\Responses\DeletionStatusResponse;
use KrZar\LaravelOpenAiApi\Base\ValueObjects\ApiVersion;
use KrZar\LaravelOpenAiApi\Files\Responses\FileResponse;
use KrZar\LaravelOpenAiApi\Files\Responses\FilesListResponse;
use KrZar\LaravelOpenAiApi\Files\ValueObjects\Purpose;

class FilesConnector extends OpenAiConnector
{
    public function uploadFile(
        File    $file,
        Purpose $purpose,
    ): FileResponse
    {
        $fileAttach = new RequestFileAttach(
            'file',
            $file,
        );

        $response = $this->post(
            ApiVersion::V1,
            'files',
            [
                'purpose' => $purpose->value,
            ],
            $fileAttach
        )->json();

        return FileResponse::create($response);
    }

    public function listFiles(): FilesListResponse
    {
        $response = $this->get(
            ApiVersion::V1,
            'files'
        )->json();

        return FilesListResponse::create($response);
    }

    public function retrieveFile(
        string $fileId
    ): FileResponse
    {
        $response = $this->get(
            ApiVersion::V1,
            "files/$fileId"
        )->json();

        return FileResponse::create($response);
    }

    public function deleteFile(
        string $fileId
    ): DeletionStatusResponse
    {
        $response = $this->delete(
            ApiVersion::V1,
            "files/$fileId"
        )->json();

        return DeletionStatusResponse::create($response);
    }

    public function retrieveFileContent(string $fileId): string
    {
        return $this->get(
            ApiVersion::V1,
            "files/$fileId/content"
        )->body();
    }
}
