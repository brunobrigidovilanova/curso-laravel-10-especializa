<?php

use App\Http\Controllers\Admin\{SupportController};
use Illuminate\Support\Facades\Route;

Route::put('/supports/{id}', [SupportController::class, 'update'])->name('supports.update'); //Salvar edição
Route::get('/supports/{id}/edit', [SupportController::class, 'edit'])->name('supports.edit'); // pagina de editar
Route::get('/supports/create', [SupportController::class, 'create'])->name('supports.create'); // Criar support
Route::get('/supports/{id}', [SupportController::class, 'show'])->name('supports.show'); // Mostrar mais detalhes do Support, "id" dinamico, deixar sempre na ultima posição para não dar conflito
Route::post('/supports', [SupportController::class, 'store'])->name('supports.store'); // Salvar support no banco de dados
Route::get('/supports', [SupportController::class, 'index'])->name('supports.index'); // Home do projeto

Route::get('/', function () {
    return view('welcome');
});
