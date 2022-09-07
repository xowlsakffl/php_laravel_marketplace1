<?php

use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminStoreController;
use App\Models\User;
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
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function(){
    
    Route::prefix('stores')->name('stores.')->group(function(){
        Route::get('/', [AdminStoreController::class, 'index'])->name('index');
        Route::get('/create', [AdminStoreController::class, 'create'])->name('create');
        Route::post('/store', [AdminStoreController::class, 'store'])->name('store');
        Route::get('/{sdx}/edit', [AdminStoreController::class, 'edit'])->name('edit');
        Route::post('/update/{sdx}', [AdminStoreController::class, 'update'])->name('update');
        Route::get('/destroy/{sdx}', [AdminStoreController::class, 'destroy'])->name('destroy');
    });
    
    Route::resource('products', AdminProductController::class)->parameters(['products' => 'pdx']);
});
