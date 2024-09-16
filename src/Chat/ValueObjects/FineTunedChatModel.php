<?php

namespace KrZar\LaravelOpenAiApi\Chat\ValueObjects;

use InvalidArgumentException;

readonly class FineTunedChatModel
{
    public function __construct(
        public ChatModel $baseModel,
        public string $id,
        public ?string $suffix = null,
    )
    {
    }

    public static function fromString(string $model): FineTunedChatModel
    {
        $modelParts = explode(':', $model);

        if ($modelParts[0] !== 'ft') {
            throw new InvalidArgumentException('Invalid model format');
        }

        if (count($modelParts) === 4) {
            return new self(
                baseModel: ChatModel::from($modelParts[1]),
                id: $modelParts[2],
                suffix: $modelParts[3],
            );
        }

        return new self(
            baseModel: ChatModel::from($modelParts[1]),
            id: $modelParts[2],
        );
    }

    public function toString(): string
    {
        return sprintf(
            'ft:%s:%s%s',
            $this->baseModel->value,
            $this->id,
            $this->suffix ? ':' . $this->suffix : '',
        );
    }
}
