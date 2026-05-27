<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| CONTROLLERS
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BusinessController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\FavoriteController;
use App\Http\Controllers\API\PromotionController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

// Test API
Route::get('/v1', function () {
    return response()->json([
        'app' => 'Carritos API',
        'status' => 'online'
    ]);
});

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

/*
|--------------------------------------------------------------------------
| CATEGORIES
|--------------------------------------------------------------------------
*/

Route::get('/categories', [CategoryController::class, 'index']);

/*
|--------------------------------------------------------------------------
| BUSINESSES
|--------------------------------------------------------------------------
*/

// Todos los negocios
Route::get('/businesses', [BusinessController::class, 'index']);

// Negocio individual
Route::get('/businesses/{id}', [BusinessController::class, 'show']);

// Negocios destacados
Route::get('/featured-businesses', [BusinessController::class, 'featured']);

// Buscar negocios cercanos
Route::get('/businesses-nearby', [BusinessController::class, 'nearby']);

// Buscar por categoría
Route::get('/businesses/category/{categoryId}', [BusinessController::class, 'byCategory']);

// Buscar por ubicación
Route::get('/businesses/location/{locationId}', [BusinessController::class, 'byLocation']);

// Buscar texto
Route::get('/businesses-search', [BusinessController::class, 'search']);

/*
|--------------------------------------------------------------------------
| PRODUCTS
|--------------------------------------------------------------------------
*/

// Productos de negocio
Route::get('/businesses/{businessId}/products', [
    ProductController::class,
    'businessProducts'
]);

// Producto individual
Route::get('/products/{id}', [
    ProductController::class,
    'show'
]);

/*
|--------------------------------------------------------------------------
| PROMOTIONS
|--------------------------------------------------------------------------
*/

// Promociones activas
Route::get('/promotions', [
    PromotionController::class,
    'index'
]);

// Promociones por negocio
Route::get('/businesses/{businessId}/promotions', [
    PromotionController::class,
    'businessPromotions'
]);

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | USER
    |--------------------------------------------------------------------------
    */

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/logout', [AuthController::class, 'logout']);

    /*
    |--------------------------------------------------------------------------
    | FAVORITES
    |--------------------------------------------------------------------------
    */

    // Lista favoritos
    Route::get('/favorites', [
        FavoriteController::class,
        'index'
    ]);

    // Agregar favorito
    Route::post('/favorites', [
        FavoriteController::class,
        'store'
    ]);

    // Eliminar favorito
    Route::delete('/favorites/{businessId}', [
        FavoriteController::class,
        'destroy'
    ]);

    /*
    |--------------------------------------------------------------------------
    | BUSINESS OWNER
    |--------------------------------------------------------------------------
    */

    // Crear negocio
    Route::post('/businesses', [
        BusinessController::class,
        'store'
    ]);

    // Actualizar negocio
    Route::put('/businesses/{id}', [
        BusinessController::class,
        'update'
    ]);

    // Eliminar negocio
    Route::delete('/businesses/{id}', [
        BusinessController::class,
        'destroy'
    ]);

    /*
    |--------------------------------------------------------------------------
    | PRODUCTS
    |--------------------------------------------------------------------------
    */

    // Crear producto
    Route::post('/products', [
        ProductController::class,
        'store'
    ]);

    // Actualizar producto
    Route::put('/products/{id}', [
        ProductController::class,
        'update'
    ]);

    // Eliminar producto
    Route::delete('/products/{id}', [
        ProductController::class,
        'destroy'
    ]);

    /*
    |--------------------------------------------------------------------------
    | PROMOTIONS
    |--------------------------------------------------------------------------
    */

    // Crear promoción
    Route::post('/promotions', [
        PromotionController::class,
        'store'
    ]);

    // Actualizar promoción
    Route::put('/promotions/{id}', [
        PromotionController::class,
        'update'
    ]);

    // Eliminar promoción
    Route::delete('/promotions/{id}', [
        PromotionController::class,
        'destroy'
    ]);
});