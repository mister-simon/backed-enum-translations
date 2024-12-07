<?php

namespace App\Enums;

use App\Enums\Traits\Translatable;

enum Status: string
{
    use Translatable;

    case Crawl = 'crawl';
    case Walk = 'walk';
    case Jump = 'jump';
    case DoubleJump = 'double-jump';
}
