<?php

namespace KrZar\LaravelOpenAiApi\Audio;

use Illuminate\Http\File;
use KrZar\LaravelOpenAiApi\Audio\Responses\AudioTextResponse;
use KrZar\LaravelOpenAiApi\Audio\Responses\AudioTranscriptionVerboseResponse;
use KrZar\LaravelOpenAiApi\Audio\ValueObjects\AudioModel;
use KrZar\LaravelOpenAiApi\Audio\ValueObjects\AudioResponseFormat;
use KrZar\LaravelOpenAiApi\Audio\ValueObjects\AudioVoice;
use KrZar\LaravelOpenAiApi\Base\OpenAiConnector;
use KrZar\LaravelOpenAiApi\Base\ValueObjects\ApiVersion;

class AudioConnector extends OpenAiConnector
{
    public function createSpeech(
        AudioModel $model,
        string $input,
        AudioVoice $voice,
        ?AudioResponseFormat $responseFormat = null,
        ?float $speed = null,
    ): File
    {
        $response = $this->post(
            ApiVersion::V1,
            'audio/speech',
            [
                'model' => $model->value,
                'input' => $input,
                'voice' => $voice->value,
                'response_format' => $responseFormat?->value,
                'speed' => $speed,
            ]
        )->body();

        $path = tempnam(sys_get_temp_dir(), 'audio');
        file_put_contents($path, $response);

        return new File($path);
    }

    public function createTranscription(
        File $file,
        AudioModel $model,
        ?string $language,
        ?string $prompt = null,
        ?float $temperature = null,
        ?array $timestampGranularities = null,
        ?bool $verbose = null,
    ): AudioTextResponse
    {
        $response = $this->post(
            ApiVersion::V1,
            'audio/transcriptions',
            [
                'file' => $file,
                'model' => $model->value,
                'language' => $language,
                'prompt' => $prompt,
                'temperature' => $temperature,
                'timestamp_granularities' => $timestampGranularities,
                'response_format' => $verbose ? 'verbose_json' : 'json',
            ]
        )->json();

        return $verbose ? AudioTranscriptionVerboseResponse::create($response) : AudioTextResponse::create($response);
    }

    public function createTranslation(
        File $file,
        AudioModel $model,
        ?string $prompt = null,
        ?float $temperature = null,
    ): AudioTextResponse
    {
        $response = $this->post(
            ApiVersion::V1,
            'audio/translations',
            [
                'file' => $file,
                'model' => $model->value,
                'prompt' => $prompt,
                'temperature' => $temperature,
            ]
        )->json();

        return AudioTextResponse::create($response);
    }
}
