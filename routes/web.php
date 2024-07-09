<?php

use Illuminate\Support\Facades\Route;
use Appslankan\Forum\Http\Controllers\ForumController;
Route::group(['middleware' => ['web']], function () {
    Route::get('forum', [ForumController::class, 'index']);
});

