<?php

namespace KrZar\LaravelOpenAiApi\FineTuning\DTO;

readonly class HyperParameters
{
    public function __construct(
        public string|int|null $bachSize = null,
        public string|float|null $learningRateMultiplier = null,
        public string|int|null $nEpochs = null,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'bachSize' => $this->bachSize,
            'learningRateMultiplier' => $this->learningRateMultiplier,
            'nEpochs' => $this->nEpochs,
        ];
    }
}
