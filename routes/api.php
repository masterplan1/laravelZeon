<?php

use App\Http\Controllers\API\FrequencyController;
use App\Http\Controllers\API\ProviderController;
use App\Http\Controllers\API\StationController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use App\Models\API\Station;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('/stations', StationController::class)->except(['destroy', 'update', 'store']);

Route::get('/search-by-number', [StationController::class, 'searchByNumber']);

Route::get('/phones/{station}', [StationController::class, 'contactsByStations']);

Route::get('/provider-contacts/{provider}', [ProviderController::class, 'index']);

Route::get('/sfn-list/{frequency}/{number}', [FrequencyController::class, 'sfnList']);

Route::group([

        'middleware' => 'api',
        'prefix' => 'auth'

    ], function ($router) {

        Route::post('login', [AuthController::class, 'login']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::get('user', [AuthController::class, 'user']);
        Route::post('register', [RegisterController::class, 'register']);
});
