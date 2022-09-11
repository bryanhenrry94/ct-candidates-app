<?php

use App\Http\Controllers\TodoController;
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
    return view('auth/login');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/todos', [TodoController::class, 'index'])->name('todos.index');
Route::get('/todo', [TodoController::class, 'create'])->name('todos.create');
Route::post('/todo', [TodoController::class, 'store'])->name('todos.store');
Route::post('/todos{todo}', [TodoController::class, 'edit'])->name('todos.edit');
Route::delete('/todos{todo}', [TodoController::class, 'destroy'])->name('todos.destroy');

require __DIR__ . '/auth.php';
