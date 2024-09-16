<?php

namespace KrZar\LaravelOpenAiApi\FineTuning\DTO\Integrations;

use KrZar\LaravelOpenAiApi\FineTuning\ValueObjects\Integrations\Wandb;

readonly class Integration
{
    public function __construct(
        public Wandb $wandb,
        public IntegrationType $type = IntegrationType::WANDB,
    )
    {
    }

    public static function fromArray(array $data): Integration
    {
        return new self(
            wandb: Wandb::fromArray($data['wandb']),
        );
    }

    public function toArray(): array
    {
        return [
            'wandb' => $this->wandb->toArray(),
        ];
    }
}
