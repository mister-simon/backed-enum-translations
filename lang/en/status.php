<?php

use App\Enums\Status;

return [
    Status::Crawl->name => 'Crawling',
    Status::Walk->name => 'Walking',
    Status::Jump->name => 'Jumping',
    Status::DoubleJump->name => 'Double Jumping',
];
