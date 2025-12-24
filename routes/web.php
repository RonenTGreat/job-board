<?php

use App\Http\Controllers\JobPostController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => to_route('jobs.index'));

Route::resource('jobs', JobPostController::class)->only(['index']);