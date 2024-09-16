<?php

namespace KrZar\LaravelOpenAiApi\Chat\DTO\LogProbs;

use KrZar\LaravelOpenAiApi\Chat\Collections\LogProbs\LogProbsItemCollection;

readonly class LogProbsItem
{
    public function __construct(
        public string $token,
        public float $logProb,
        public ?array $bytes,
        public ?LogProbsItemCollection $topLogProbs = null,
    )
    {
    }

    public static function fromArray(array $data): LogProbsItem
    {
        return new self(
            token: $data['token'],
            logProb: $data['logprob'],
            bytes: $data['bytes'],
            topLogProbs: isset($data['top_logprobs']) ? LogProbsItemCollection::fromArray(
                $data['top_logprobs']
            ) : null,
        );
    }
}
