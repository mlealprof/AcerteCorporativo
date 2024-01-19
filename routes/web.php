<?php

use Illuminate\Support\Facades\Route;
use App\Models\Produto;
use APP\Html\Controllers\ProdutosController;

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
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\web\HomerController::class, 'home']);
Route::get('/categorias/{id}', [App\Http\Controllers\ProdutosController::class, 'produtos','id']);
Route::get('/portifolio', [App\Http\Controllers\ProdutosController::class, 'portifolio']);
Route::get('/produtos', [App\Http\Controllers\ProdutosController::class, 'index'])->middleware('auth');
Route::get('/produtos/novo', [App\Http\Controllers\ProdutosController::class, 'novo'])->middleware('auth');
Route::post('/produtos/salvar', [App\Http\Controllers\ProdutosController::class, 'inserir'])->middleware('auth');
Route::get('/produtos/{produto}/atacado', [App\Http\Controllers\ProdutosController::class, 'atacado','produto']);
Route::post('/produtos/atacado_add', [App\Http\Controllers\AtacadoController::class, 'adicionar'])->middleware('auth');
Route::get('/produtos/{produto}/delete_atacado', [App\Http\Controllers\AtacadoController::class, 'delete_atacado','produto'])->middleware('auth');
Route::get('/produtos/{produto}/variacao', [App\Http\Controllers\ProdutosController::class, 'variacao','produto'])->middleware('auth');
Route::post('/produtos/variacao_add', [App\Http\Controllers\VariacaoController::class, 'adicionar'])->middleware('auth');
Route::get('/produtos/{produto}/delete_variacao', [App\Http\Controllers\VariacaoController::class, 'delete_variacao','produto'])->middleware('auth');
Route::get('/produtos/{produto}/delete', [App\Http\Controllers\ProdutosController::class, 'delete','produto'])->middleware('auth');
Route::get('/categorias', [App\Http\Controllers\CategoriasController::class, 'index'])->middleware('auth');
Route::post('/categorias/add', [App\Http\Controllers\CategoriasController::class, 'adicionar'])->middleware('auth');
Route::get('/categorias/{categoria}/delete', [App\Http\Controllers\CategoriasController::class, 'delete','categorias'])->middleware('auth');
Route::get('/tipo', [App\Http\Controllers\TipoController::class, 'index'])->middleware('auth');
Route::post('/tipos/add', [App\Http\Controllers\TipoController::class, 'adicionar'])->middleware('auth');
Route::get('/tipos/{tipo}/delete', [App\Http\Controllers\TipoController::class, 'delete','tipo'])->middleware('auth');
Route::get('/produtos/{produto}/editar', [App\Http\Controllers\ProdutosController::class, 'editar','produto'])->middleware('auth');
Route::post('/produtos/editar', [App\Http\Controllers\ProdutosController::class, 'update','produto'])->middleware('auth');

Route::get('/busca', [App\Http\Controllers\ProdutosController::class, 'busca']);
Route::get('/gerar_pdf', [App\Http\Controllers\ProdutosController::class, 'gera_pdf']);
