<?php

namespace KrZar\LaravelOpenAiApi\Images;

use Illuminate\Http\File;
use KrZar\LaravelOpenAiApi\Base\DTO\RequestFileAttach;
use KrZar\LaravelOpenAiApi\Base\OpenAiConnector;
use KrZar\LaravelOpenAiApi\Base\ValueObjects\ApiVersion;
use KrZar\LaravelOpenAiApi\Images\Responses\ImageResponse;
use KrZar\LaravelOpenAiApi\Images\ValueObjects\ImageModel;
use KrZar\LaravelOpenAiApi\Images\ValueObjects\ImageQuality;
use KrZar\LaravelOpenAiApi\Images\ValueObjects\ImageResponseFormat;
use KrZar\LaravelOpenAiApi\Images\ValueObjects\ImageSize\DallE2ImageSize;
use KrZar\LaravelOpenAiApi\Images\ValueObjects\ImageSize\DallE3ImageSize;
use KrZar\LaravelOpenAiApi\Images\ValueObjects\ImageStyle;

class ImagesConnector extends OpenAiConnector
{
    public function createImage(
        string $prompt,
        ImageModel $model,
        ?int $numberOfImages = null,
        ?ImageQuality $quality = null,
        ?ImageResponseFormat $responseFormat = null,
        DallE2ImageSize|DallE3ImageSize|null $size = null,
        ?ImageStyle $style = null,
        ?string $user = null,
    ): ImageResponse
    {
        $response = $this->post(
            ApiVersion::V1,
            'images/generations',
            [
                'prompt' => $prompt,
                'model' => $model->value,
                'n' => $numberOfImages,
                'quality' => $quality?->value,
                'response_format' => $responseFormat?->value,
                'size' => $size?->value,
                'style' => $style?->value,
                'user' => $user,
            ]
        )->json();

        return ImageResponse::create($response);
    }

    public function createImageEdit(
        File $image,
        string $prompt,
        ?File $mask = null,
        ?int $numberOfImages = null,
        ?DallE2ImageSize $size = null,
        ?ImageResponseFormat $responseFormat = null,
        ?string $user = null,
    ): ImageResponse
    {
        $attachments = [];

        $attachments[] = new RequestFileAttach(
            'image',
            $image,
        );

        if ($mask) {
            $attachments[] = new RequestFileAttach(
                'mask',
                $mask,
            );
        }

        $response = $this->post(
            ApiVersion::V1,
            'images/edits',
            [
                'prompt' => $prompt,
                'n' => $numberOfImages,
                'size' => $size?->value,
                'response_format' => $responseFormat?->value,
                'user' => $user,
            ],
            $attachments
        )->json();

        return ImageResponse::create($response);
    }

    public function createImageVariation(
        File $image,
        ?int $numberOfImages = null,
        ?ImageResponseFormat $responseFormat = null,
        ?DallE2ImageSize $size = null,
        ?string $user = null,
    ): ImageResponse
    {
        $response = $this->post(
            ApiVersion::V1,
            'images/variations',
            [
                'n' => $numberOfImages,
                'size' => $size?->value,
                'response_format' => $responseFormat?->value,
                'user' => $user,
            ],
            new RequestFileAttach(
                'image',
                $image,
            )
        )->json();

        return ImageResponse::create($response);
    }
}
