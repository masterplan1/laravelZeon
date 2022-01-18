<?php

use App\Http\Controllers\API\ConditionController;
use App\Http\Controllers\Auth\LoginController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

if(User::where('admin', 1)->exists()){
    Auth::routes(['register' => false, 'reset' => false, 'confirm' => false]);
}else{
    Auth::routes();
}
// Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('conditions/export', [ConditionController::class, 'export']);


