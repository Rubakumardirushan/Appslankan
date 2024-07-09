<?php

use Illuminate\Support\Facades\Route;
use Appslankan\Forum\Http\Controllers\ForumController;
Route::get('forum', [ForumController::class, 'index']);
