<?php

use App\Http\Controllers\JobPostController;
use Illuminate\Support\Facades\Route;

Route::resource('jobs', JobPostController::class)->only(['index']);