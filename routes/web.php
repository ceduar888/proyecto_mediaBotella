<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/categoria/list', [CategoriaController::class, 'index']);
Route::get('/categoria/create', [CategoriaController::class, 'create']);
Route::post('/categoria/create', [CategoriaController::class, 'store']);
Route::get('/categoria/edit/{id}', [CategoriaController::class, 'edit']);
Route::post('/categoria/edit/{id}', [CategoriaController::class, 'update']);
Route::get('/categoria/delete/{id}', [CategoriaController::class, 'destroy']);

Route::get('/producto/list', [ProductoController::class, 'index']);
Route::get('/producto/create', [ProductoController::class, 'create']);
Route::post('/producto/create', [ProductoController::class, 'store']);
Route::get('/producto/edit/{id}', [ProductoController::class, 'edit']);
Route::post('/producto/edit/{id}', [ProductoController::class, 'update']);
Route::get('/producto/delete/{id}', [ProductoController::class, 'destroy']);

Route::get('/proveedor/list', [ProveedorController::class, 'index']);
Route::get('/proveedor/create', [ProveedorController::class, 'create']);
Route::post('/proveedor/create', [ProveedorController::class, 'store']);
Route::get('/proveedor/edit/{id}', [ProveedorController::class, 'edit']);
Route::post('/proveedor/edit/{id}', [ProveedorController::class, 'update']);
Route::get('/proveedor/delete/{id}', [ProveedorController::class, 'destroy']);

Route::get('/compras/list', [ComprasController::class, 'index']);
Route::get('/compras/create', [ComprasController::class, 'create']);
Route::post('/compras/create', [ComprasController::class, 'store']);
Route::get('/compras/edit/{id}', [ComprasController::class, 'edit']);
Route::post('/compras/edit/{id}', [ComprasController::class, 'update']);
Route::get('/compras/delete/{id}', [ComprasController::class, 'destroy']);

Route::get('/orden/list', [OrdenController::class, 'index']);
Route::get('/orden/management', [OrdenController::class, 'management']);

Route::get('/usuario/list', [UserController::class, 'index']);
Route::get('/usuario/create', [UserController::class, 'create']);
Route::get('/usuario/delete/{id}', [UserController::class, 'destroy']);