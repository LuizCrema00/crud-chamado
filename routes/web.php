<?php

use App\Http\Controllers\ChamadosController;
use Illuminate\Support\Facades\Route;

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
    return redirect('/chamados');
});

Route::get('/chamados', [ChamadosController::class, 'index'])->name('chamados.index');
Route::get('/chamados/create', [ChamadosController::class, 'create'])->name('chamados.create');
Route::post('/chamados', [ChamadosController::class, 'store'])->name('chamados.store');
Route::get('/chamados/{chamado}/edit', [ChamadosController::class, 'edit'])->name('chamados.edit');
Route::put('/chamados/{chamado}', [ChamadosController::class, 'update'])->name('chamados.update');
Route::delete('/chamados/{chamado}', [ChamadosController::class, 'destroy'])->name('chamados.destroy');



