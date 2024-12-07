<?php

use App\Enums\Role;
use App\Enums\Status;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    dd(
        // Basics
        Status::Jump->trans(),
        Status::options(),

        // Countable translations are possible without too much effort
        Role::Cat->trans(),
        Role::Cat->transChoice(2),
        Role::options(),
        Role::optionsChoice(2),
    );
});
