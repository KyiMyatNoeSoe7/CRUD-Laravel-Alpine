<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;

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
    return view('alpine-book-crud');
});

// Route::get('/student-session', function () {
//     return view('student-session');
// });
Route::get('/student-session',[SessionController::class,'get'])->name('student-session.get');
Route::post('/student-session',[SessionController::class,'store'])->name('student-session.store');
Route::get('/student-session/show',[SessionController::class,'show'])->name('student-session.show');