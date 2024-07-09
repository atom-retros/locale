<?php

use Atom\Locale\Http\Controllers\LocaleController;
use Illuminate\Support\Facades\Route;

Route::get('/locale/{locale}', LocaleController::class)
    ->middleware('web')
    ->name('locale');
