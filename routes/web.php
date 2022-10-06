<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;

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

Auth::routes();

// 2fa middleware
Route::middleware(['2fa'])->group(function () {

    // HomeController
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::post('/2fa', function () {
        return redirect(route('home'));
    })->name('2fa');

});

Route::get('/complete-registration', [RegisterController::class, 'completeRegistration'])->name('complete.registration');
