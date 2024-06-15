<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(DataController::class)->group(function(){
    Route::get('add/{limit?}', 'add');
    Route::get('show/{limit?}', 'show');
    Route::get('get/{condition?}/{test?}/{limit?}', 'get');
});
