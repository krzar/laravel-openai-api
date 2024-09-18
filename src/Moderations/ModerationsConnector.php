<?php

namespace KrZar\LaravelOpenAiApi\Moderations;

use KrZar\LaravelOpenAiApi\Base\OpenAiConnector;
use KrZar\LaravelOpenAiApi\Base\ValueObjects\ApiVersion;
use KrZar\LaravelOpenAiApi\Moderations\Responses\ModerationResponse;
use KrZar\LaravelOpenAiApi\Moderations\ValueObjects\ModerationModel;

class ModerationsConnector extends OpenAiConnector
{
    public function createModeration(
        string|array $input,
        ?ModerationModel $model = null,
    ): ModerationResponse
    {
        $response = $this->post(
            ApiVersion::V1,
            'moderations',
            [
                'model' => $model?->value,
                'input' => $input,
            ],
        )->json();

        return ModerationResponse::create($response);
    }
}
