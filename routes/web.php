<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisteredUserController;



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


    Route::get('/criar-usuario',[UserController::class,'create'])->name('criar.usuario');
Route::post('/criar-usuario',[UserController::class,'store'])->name('criar.usuario');
Route::get('/listar-usuarios',[UserController::class,'index'])->name('listar.usuarios');
Route::get('/listar-usuariosfiltrados',[UserController::class,'pesquisarPorNome'])->name('listar.usuariosfiltrados');
Route::post('/listar-usuariosfiltrados',[UserController::class,'pesquisarPorNome'])->name('listar.usuariosfiltrados');
Route::get('/alterar-usuario/{usuario}',[UserController::class,'edit'])->name('alterar.usuario');
Route::put('/alterar-usuario/{usuario}',[UserController::class,'update'])->name('alterar.usuario');
Route::get('/excluir-usuario/{usuario}', [UserController::class, 'destroy'])->name('excluir.usuario');
Route::get('/mostrar-usuario/{id}',[UserController::class,'show'])->name('mostrar.usuario');

//rotas para alterar senha pelo administrativo
Route::get('/alterar-senha/{id}',[UserController::class,'formAlterarSenha'])->name('alterar.senha');
Route::post('/alterar-senha/{id}',[UserController::class,'alterarSenha'])->name('alterar.senha');


//rotas para alterar senha do proprio usuario
Route::get('/alterar-senhaself',[UserController::class,'formAlterarSenhaSelf'])->name('alterar.senhaself');
Route::post('/alterar-senhaself',[UserController::class,'alterarSenhaSelf'])->name('alterar.senhaself');

//excluir a foto do usuário
/* Route::get('/excluirfoto-usuario/{id}',[UserController::class,'excluirFoto'])->name('excluirFoto.usuario');
Route::post('/excluirfoto-usuario/{id}',[UserController::class,'excluirFoto'])->name('excluirFoto.usuario'); */

//trocar a foto do usuário
Route::get('/excluir-foto-usuario/{id}',[UserController::class,'excluirFoto'])->name('excluir-foto.usuario');
Route::post('/trocar-foto-usuario/{id}',[UserController::class,'trocarFoto'])->name('trocar-foto.usuario');

});

require __DIR__.'/auth.php';
