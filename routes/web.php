<?php

use Illuminate\Support\Facades\Route;


// Generales Web sin Auth 

Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])
    ->name('home');
Route::get('/quienes-somos', [\App\Http\Controllers\AboutController::class, 'about'])
    ->name('about');

// Posteos - Entradas 
Route::get('/blog', [\App\Http\Controllers\BlogController::class, 'indexBlog'])
    ->name('posts');

Route::get('blog/entradas/{id}', [\App\Http\Controllers\BlogController::class, 'viewFullPost'])
    ->name('posts.fullpost');

// Productos
Route::get('/productos/{id}/confirmacion', [\App\Http\Controllers\ProductController::class, 'confirmContractProduct'])
    ->name('products.confirmContractProduct');

Route::post('/productos/contratacion/{id}', [\App\Http\Controllers\ProductController::class, 'processContractProduct'])
    ->name('products.processContractProduct');


// Autenticación - proceso login - logout 

Route::get('/registrarse', [\App\Http\Controllers\AuthController::class, 'formRegister'])
    ->name('auth.formRegister');
Route::post('/registrarse', [\App\Http\Controllers\AuthController::class, 'processRegister'])
    ->name('auth.processRegister');

Route::get('/iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'formLogin'])
    ->name('auth.formLogin');

Route::post('/iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'processLogin'])
    ->name('auth.processLogin');

Route::post('/cerrar-sesion', [\App\Http\Controllers\AuthController::class, 'processLogout'])
    ->name('auth.processLogout');

// *** A PARTIR DE ACÁ TODO ADMIN AUTH ** 

// ADMIN - POSTEOS - ENTRADAS
Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'indexPosts'])
    ->name('dashboardPosts')
    ->middleware(['auth', 'isAdmin']);

Route::get('/dashboard/clientes', [\App\Http\Controllers\AdminController::class, 'indexUsers'])
    ->name('dashboardUsers')
    ->middleware(['auth', 'isAdmin']);

// ADMIN - CATEGORIAS 
Route::get('/dashboard/categorias', [\App\Http\Controllers\AdminController::class, 'indexCategories'])
    ->name('dashboardCategories')
    ->middleware(['auth', 'isAdmin']);

Route::get('categorias/nueva', [\App\Http\Controllers\CategoryController::class, 'formNew'])
    ->name('categories.formNew')
    ->middleware(['auth', 'isAdmin']);

Route::post('categorias/nueva', [\App\Http\Controllers\CategoryController::class, 'processNew'])
    ->name('categories.processNew')
    ->middleware(['auth', 'isAdmin']);

Route::get('categorias/{id}/editar', [\App\Http\Controllers\CategoryController::class, 'formEdit'])
    ->name('categories.formEdit')
    ->middleware(['auth', 'isAdmin']);

Route::post('categorias/{id}/editar', [\App\Http\Controllers\CategoryController::class, 'processEdit'])
    ->name('categories.processEdit')
    ->middleware(['auth', 'isAdmin']);

Route::get('categorias/{id}/eliminar', [\App\Http\Controllers\CategoryController::class, 'confirmDelete'])
    ->name('categories.confirmDelete')
    ->middleware(['auth', 'isAdmin']);

Route::post('categorias/{id}/eliminar', [\App\Http\Controllers\CategoryController::class, 'processDelete'])
    ->name('categories.processDelete')
    ->middleware(['auth', 'isAdmin']);

// ADMIN ABM ENTRADAS-POSTEOS

Route::get('entradas/nueva', [\App\Http\Controllers\PostController::class, 'formNew'])
    ->name('posts.formNew')
    ->middleware(['auth', 'isAdmin']);


Route::post('entradas/nueva', [\App\Http\Controllers\PostController::class, 'processNew'])
    ->name('posts.processNew')
    ->middleware(['auth', 'isAdmin']);


Route::get('entradas/{id}/editar', [\App\Http\Controllers\PostController::class, 'formEdit'])
    ->name('posts.formEdit')
    ->middleware(['auth', 'isAdmin']);


Route::post('entradas/{id}/editar', [\App\Http\Controllers\PostController::class, 'processEdit'])
    ->name('posts.processEdit')
    ->middleware(['auth', 'isAdmin']);

Route::get('entradas/{id}', [\App\Http\Controllers\PostController::class, 'view'])
    ->name('posts.view')
    ->middleware(['auth', 'isAdmin']);


Route::get('entradas/{id}/eliminar', [\App\Http\Controllers\PostController::class, 'confirmDelete'])
    ->name('posts.confirmDelete')
    ->middleware(['auth', 'isAdmin']);

Route::post('entradas/{id}/eliminar', [\App\Http\Controllers\PostController::class, 'processDelete'])
    ->name('posts.processDelete')
    ->middleware(['auth', 'isAdmin']);
