<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirmenController;
use App\Http\Controllers\MitarbeiterController;

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
Route::resource('/firmen', FirmenController::class)->only([
    'index']);
Route::resource('/mitarbeiter', MitarbeiterController::class)->only([
    'index', 'show', 'store']);
