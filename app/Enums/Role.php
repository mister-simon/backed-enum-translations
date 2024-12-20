<?php

namespace App\Enums;

use App\Enums\Traits\TranslatableChoices;

enum Role: string
{
    use TranslatableChoices;

    case User = 'user';
    case Guest = 'guest';
    case Cat = 'cat';

    public static function langFile(): string
    {
        return 'role';
    }

    protected function langKey()
    {
        return match ($this) {
            Role::User => 'u',
            Role::Guest => 'g',
            Role::Cat => 'c',
        };
    }
}
