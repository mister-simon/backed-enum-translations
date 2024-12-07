<?php

use App\Enums\Role;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    dd(
        Role::Cat->trans(),
        Role::select()
    );
});
