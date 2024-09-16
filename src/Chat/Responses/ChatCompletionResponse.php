<?php

namespace KrZar\LaravelOpenAiApi\Chat\Responses;

use Illuminate\Support\Carbon;
use KrZar\ArrayDto\ArrayDto;
use KrZar\ArrayDto\Casts\ClosureCast;
use KrZar\ArrayDto\Casts\NameCast;
use KrZar\LaravelOpenAiApi\Chat\Collections\Choice\ChoiceCollection;
use KrZar\LaravelOpenAiApi\Chat\DTO\Usage;
use KrZar\LaravelOpenAiApi\Chat\ValueObjects\ChatModel;

class ChatCompletionResponse extends ArrayDto
{
    public string $id;
    public ChoiceCollection $choices;
    public Carbon $created;
    public ChatModel $model;
    public string $systemFingerprint;
    public string $object;
    public Usage $usage;
    public ?string $serviceTier = null;

    protected function casts(): array
    {
        return [
            'choices' => new ClosureCast(fn(array $value) => ChoiceCollection::fromArray($value)),
            'created' => new ClosureCast(fn(int $value) => Carbon::createFromTimestamp($value)),
            'systemFingerprint' => new NameCast('system_fingerprint'),
            'serviceTier' => new NameCast('service_tier'),
            'usage' => new ClosureCast(fn(array $value) => Usage::fromArray($value)),
        ];
    }
}
