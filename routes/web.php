<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/criar-usuario',[UserController::class,'create'])->name('criar.usuario');
Route::post('/criar-usuario',[UserController::class,'store'])->name('criar.usuario');
Route::get('/listar-usuarios',[UserController::class,'index'])->name('listar.usuarios');
Route::get('/alterar-usuario/{usuario}',[UserController::class,'edit'])->name('alterar.usuario');
Route::get('/excluir-usuario/{usuario}', [UserController::class, 'destroy'])->name('excluir.usuario');

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('welcome');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('register', [RegisteredUserController::class, 'create'])
                ->can('criar-usuario')
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store'])
    ->can('criar-usuario');


});

require __DIR__.'/auth.php';
