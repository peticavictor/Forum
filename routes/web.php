<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('index');
// })->middleware('auth');

Auth::routes();

Route::get('/', [Controller::class, 'index'])->name('index'); //->middleware('auth')
Route::get('/{id}', [Controller::class, 'secondIndex'])->name('secondIndex'); //->middleware('auth')
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/createQuestion', [QuestionController::class, 'createQuestion']);
Route::post('/question', [QuestionController::class, 'store']);
