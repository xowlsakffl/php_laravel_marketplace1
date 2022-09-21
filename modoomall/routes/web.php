<?php

use App\Http\Controllers\Admin\AdminProductCategoryController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminStoreController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
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
    return view('home');
});

require __DIR__.'/auth.php';


Route::middleware(['auth'])->group(function(){
    Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function(){
        Route::resource('stores', AdminStoreController::class)->parameters(['stores' => 'sdx'])->except([
            'store'
        ]);
        Route::resource('products', AdminProductController::class)->parameters(['products' => 'pdx']);
        Route::resource('/product-categories', AdminProductCategoryController::class)->parameters(['product-categories' => 'pcdx']);
    });

    Route::middleware(['storeExist'])->group(function(){
        Route::get('/stores/make', function () {
            return view('storemake');
        })->name('storemake');
        Route::get('/stores/create', [StoreController::class, 'create'])->name('stores.create');
        Route::post('/stores/store', [StoreController::class, 'store'])->name('stores.store');
    });
    
    Route::middleware(['store'])->group(function(){
        Route::get('/stores', [StoreController::class, 'show'])->name('stores.show');
        Route::get('/stores/edit', [StoreController::class, 'edit'])->name('stores.edit');
        Route::put('/stores', [StoreController::class, 'update'])->name('stores.update');
        Route::delete('/stores', [StoreController::class, 'delete'])->name('stores.delete');

        Route::resource('products', ProductController::class)->parameters(['products' => 'pdx']);
    
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::post('files/remove', [FileController::class, 'removeFile'])->name('file.remove');
    });
});