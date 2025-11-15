<?php

use App\Http\Controllers\Dashboard\Reviews\ReviewsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->post('/settings',[ReviewsController::class,'saveReviewLink']);
