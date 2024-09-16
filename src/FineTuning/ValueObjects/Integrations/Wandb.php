<?php

namespace KrZar\LaravelOpenAiApi\FineTuning\ValueObjects\Integrations;

readonly class Wandb
{
    public function __construct(
        public string $project,
        public ?string $name = null,
        public ?string $entity = null,
        public ?array $tags = null,
    )
    {
    }

    public static function fromArray(array $data): Wandb
    {
        return new self(
            project: $data['project'],
            name: $data['name'] ?? null,
            entity: $data['entity'] ?? null,
            tags: $data['tags'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'project' => $this->project,
            'name' => $this->name,
            'entity' => $this->entity,
            'tags' => $this->tags,
        ];
    }
}
