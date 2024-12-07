<?php

namespace App\Enums;

use App\Enums\Traits\Translatable;

enum Role: string
{
    use Translatable;

    case Admin = 'admin';
    case User = 'user';
    case Guest = 'guest';
    case Cat = 'cat';
}
