<?php

namespace KrZar\LaravelOpenAiApi\Chat;

use KrZar\LaravelOpenAiApi\Base\OpenAiConnector;
use KrZar\LaravelOpenAiApi\Base\ValueObjects\ApiVersion;
use KrZar\LaravelOpenAiApi\Chat\Collections\Message\MessagesCollection;
use KrZar\LaravelOpenAiApi\Chat\Collections\Message\Tool\ToolsCollection;
use KrZar\LaravelOpenAiApi\Chat\DTO\Message\Tool\Tool;
use KrZar\LaravelOpenAiApi\Chat\Responses\ChatCompletionResponse;
use KrZar\LaravelOpenAiApi\Chat\ValueObjects\ChatModel;
use KrZar\LaravelOpenAiApi\Chat\ValueObjects\FineTunedChatModel;
use KrZar\LaravelOpenAiApi\Chat\ValueObjects\Message\ServiceTier;
use KrZar\LaravelOpenAiApi\Chat\ValueObjects\Message\Tool\ToolChoice;
use KrZar\LaravelOpenAiApi\Chat\ValueObjects\Message\Types\ChatMessage;

class ChatConnector extends OpenAiConnector
{
    public function createCompletion(
        MessagesCollection $messages,
        ChatModel|FineTunedChatModel $model,
        ?float $frequencyPenalty = null,
        ?array $logitBias = null,
        ?bool $logProbs = null,
        ?bool $topLogProbs = null,
        ?int $maxTokens = null,
        ?int $choicesNumber = null,
        ?float $presencePenalty = null,
        ?int $seed = null,
        ?ServiceTier $serviceTier = null,
        string|array|null $stop = null,
        ?bool $stream = null,
        ?bool $streamIncludeUsage = null,
        ?int $temperature = null,
        ?int $topP = null,
        ?ToolsCollection $tools = null,
        Tool|ToolChoice|null $toolChoice = null,
        ?bool $parallelToolCalls = null,
        ?string $user = null,
    ): ChatCompletionResponse
    {
        $response = $this->post(
            ApiVersion::V1,
            'chat/completions',
            [
                'messages' => $messages->map(
                    fn (ChatMessage $message) => $message->toArray()
                )->toArray(),
                'model' => $model->value,
                'frequency_penalty' => $frequencyPenalty,
                'logit_bias' => $logitBias,
                'logprobs' => $logProbs,
                'top_logprobs' => $topLogProbs,
                'max_tokens' => $maxTokens,
                'n' => $choicesNumber,
                'presence_penalty' => $presencePenalty,
                'seed' => $seed,
                'service' => $serviceTier?->value,
                'stop' => $stop,
                'stream' => $stream,
                'stream_include_all' => $streamIncludeUsage,
                'temperature' => $temperature,
                'top_p' => $topP,
                'tools' => $tools?->toArray(),
                'tool_choice' => $toolChoice?->toArray(),
                'parallel_tool_calls' => $parallelToolCalls,
                'user' => $user,
            ]
        )->json();

        return ChatCompletionResponse::create($response);
    }
}
