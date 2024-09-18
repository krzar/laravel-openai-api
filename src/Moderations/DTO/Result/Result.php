<?php

namespace KrZar\LaravelOpenAiApi\Moderations\DTO\Result;

readonly class Result
{
    public function __construct(
        public bool $flagged,
        public ResultCategories $categories,
        public ResultCategoryScores $categoryScores
    )
    {
    }

    public static function fromArray(array $data): Result
    {
        return new self(
            flagged: $data['flagged'],
            categories: ResultCategories::fromArray($data['categories']),
            categoryScores: ResultCategoryScores::fromArray($data['category_scores'])
        );
    }
}
