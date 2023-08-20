<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\VendasController;
use App\Http\Controllers\DashboardController;

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

//Dashboard
Route::prefix('dashboard')->group(function () {
    Route::get('/',[DashboardController::class, 'index']) -> name('dashboard.index');
});

//PRODUTOS
Route::prefix('produtos')->group(function () {
    Route::get('/',[ProdutosController::class, 'index']) -> name('produto.index');
    // create
    Route::get('/cadastrarProduto',[ProdutosController::class, 'cadastrarProduto']) -> name('cadastrar.produto');
    Route::post('/cadastrarProduto',[ProdutosController::class, 'cadastrarProduto']) -> name('cadastrar.produto');
    // edit
    Route::get('/atualizarProduto/{id}',[ProdutosController::class, 'atualizarProduto']) -> name('atualizar.produto');
    Route::put('/atualizarProduto/{id}',[ProdutosController::class, 'atualizarProduto']) -> name('atualizar.produto');
    //delete
    Route::delete('/delete',[ProdutosController::class, 'delete']) -> name('produto.delete');
});

//CLIENTES
Route::prefix('clientes')->group(function () {
    Route::get('/',[ClientesController::class, 'index']) -> name('cliente.index');
    // create
    Route::get('/cadastrarCliente',[ClientesController::class, 'cadastrarCliente']) -> name('cadastrar.cliente');
    Route::post('/cadastrarCliente',[ClientesController::class, 'cadastrarCliente']) -> name('cadastrar.cliente');
    // edit
    Route::get('/atualizarCliente/{id}',[ClientesController::class, 'atualizarCliente']) -> name('atualizar.cliente');
    Route::put('/atualizarCliente/{id}',[ClientesController::class, 'atualizarCliente']) -> name('atualizar.cliente');
    //delete
    Route::delete('/delete',[ClientesController::class, 'delete']) -> name('cliente.delete');
});

//Vendas
Route::prefix('vendas')->group(function () {
    Route::get('/',[VendasController::class, 'index']) -> name('venda.index');
    // create
    Route::get('/cadastrarVenda',[VendasController::class, 'cadastrarVenda']) -> name('cadastrar.venda');
    Route::post('/cadastrarVenda',[VendasController::class, 'cadastrarVenda']) -> name('cadastrar.venda');
});