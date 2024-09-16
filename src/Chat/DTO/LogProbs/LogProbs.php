<?php

namespace KrZar\LaravelOpenAiApi\Chat\DTO\LogProbs;

use KrZar\LaravelOpenAiApi\Chat\Collections\LogProbs\LogProbsItemCollection;

readonly class LogProbs
{
    public function __construct(
        public LogProbsItemCollection $content,
        public LogProbsItemCollection $refusal,
    )
    {
    }

    public static function fromArray(array $data): LogProbs
    {
        return new self(
            content: LogProbsItemCollection::fromArray($data['content']),
            refusal: LogProbsItemCollection::fromArray($data['refusal']),
        );
    }
}
