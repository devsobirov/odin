<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CustomAuthController as AuthController;
use App\Http\Controllers\Project\MainController as Project;
use App\Http\Controllers\Terminal\MainController as Terminal;
use App\Http\Controllers\Project\TerminalController;
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

Route::get('login', [AuthController::class, 'loginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('submit-login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', \App\Http\Controllers\HomeController::class)->name('home');

Route::middleware('auth:project')->prefix('project')->as('project.')
    ->group(function () {
    Route::get('/', [Project::class, 'index'])->name('home');
    Route::get('/terminals', [TerminalController::class, 'index'])->name('terminals.index');
    Route::get('/terminals/form/{id?}', [TerminalController::class, 'form'])->name('terminals.form');
    Route::post('/terminals/save/{id?}', [TerminalController::class, 'save'])->name('terminals.save');

});

Route::middleware('auth:terminal')->prefix('terminal')->as('terminal.')
    ->group(function () {
    Route::get('/', [Terminal::class, 'index'])->name('home');
    Route::post('/order', [Terminal::class, 'order'])->name('order');
});
