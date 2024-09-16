<?php

namespace KrZar\LaravelOpenAiApi\Chat\ValueObjects;

enum ChatModel: string
{
    case GPT4o = 'gpt-4o';
    case GPT4o_2024_05_13 = 'gpt-4o-2024-05-13';
    case GPT4o_2024_08_06 = 'gpt-4o-2024-08-06';
    case CHAT_GPT4o_LATEST = 'chatgpt-4o-latest';

    case GPT4o_MINI = 'gpt-4o-mini';
    case GPT4o_MINI_2024_07_18 = 'gpt-4o-mini-2024-07-18';

    case GPT4_TURBO = 'gpt-4-turbo';
    case GPT4_TURBO_2024_04_09 = 'gpt-4-turbo-2024-04-09';
    case GPT4_TURBO_PREVIEW = 'gpt-4-turbo-preview';

    case GPT4 = 'gpt-4';
    case GPT4_0613 = 'gpt-4-0613';
    case GPT4_0314 = 'gpt-4-0314';
    case GPT4_0125_PREVIEW = 'gpt-4-0125-preview';
    case GPT4_1106_PREVIEW = 'gpt-4-1106-preview';

    case GPT35_TURBO = 'gpt-3.5-turbo';
    case GPT35_TURBO_0125 = 'gpt-3.5-turbo-0125';
    case GPT35_TURBO_1106 = 'gpt-3.5-turbo-1106';
    case GPT35_TURBO_INSTRUCT = 'gpt-3.5-turbo-instruct';
}
