<?php

use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PredictionController;
use App\Http\Controllers\Api\VerificationEmailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);
Route::get('articles', [ArticleController::class, 'getArticles']);
Route::get('articles/{total}', [ArticleController::class, 'getHomeArticles']);
Route::get('articles/{slug}/show', [ArticleController::class, 'showArticle']);
Route::get('send-otp', [VerificationEmailController::class, 'sendOtp']);
Route::post('verify-email', [VerificationEmailController::class, 'verifyEmail']);
Route::post('/predict', [PredictionController::class, 'predict']);
