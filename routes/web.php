<?php

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


Route::get('/', [\App\Http\Controllers\PageController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/contact', [\App\Http\Controllers\PageController::class, 'contact']);

Route::get('/productions/{id}', [\App\Http\Controllers\PageController::class, 'productSubcategory']);
Route::get('productions/{sub_id}/product/{id}', [\App\Http\Controllers\PageController::class, 'product']);

Route::get('productSubcategory', [\App\Http\Controllers\PageController::class, 'productSubcategory'])->name('productSubcategory');


Route::get('search', [\App\Http\Controllers\PageController::class, 'search'])->name('search');






Auth::routes();


Route::post('sendmail', [\App\Http\Controllers\EmailController::class, 'index']);


Route::middleware(['role:admin'])->prefix('admin_panel')->group( function () {
    Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index']);


    // საიტის პარამეტრები
    Route::get('options', [\App\Http\Controllers\Admin\OptionsController::class, 'index']);

    // პროდუქციის კატეგორია
    Route::get('category', [\App\Http\Controllers\Admin\CategoryController::class, 'index']);
    Route::get('category/create', [\App\Http\Controllers\Admin\CategoryController::class, 'create']);
    Route::post('create_category', [\App\Http\Controllers\Admin\CategoryController::class, 'store']);
    Route::delete('delete_category/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'destroy']);
    Route::get('category/edit/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'edit']);
    Route::put('category_update/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'update']);

    // პროდუქციის ქვეკატეოგირა

    Route::get('subcategory', [\App\Http\Controllers\Admin\SubcategoryController::class, 'index']);
    Route::get('subcategory/create', [\App\Http\Controllers\Admin\SubcategoryController::class, 'create']);
    Route::post('create_subcategory', [\App\Http\Controllers\Admin\SubcategoryController::class, 'store']);
    Route::delete('delete_subcategory/{id}', [\App\Http\Controllers\Admin\SubcategoryController::class, 'destroy']);
    Route::get('subcategory/edit/{id}', [\App\Http\Controllers\Admin\SubcategoryController::class, 'edit']);
    Route::put('subcategory_update/{id}', [\App\Http\Controllers\Admin\SubcategoryController::class, 'update']);


    // პროდუქტები



    Route::get('product', [\App\Http\Controllers\Admin\ProductController::class, 'index']);

    Route::get('product/create', [\App\Http\Controllers\Admin\ProductController::class, 'create']);
    Route::post('create_product', [\App\Http\Controllers\Admin\ProductController::class, 'store']);

    Route::delete('delete_product/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'destroy']);
    Route::get('category/edit/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'edit']);
    Route::put('update_product/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'update']);


    // slider

    Route::get('slider', [\App\Http\Controllers\Admin\SliderController::class, 'index']);

    Route::get('slider/create', [\App\Http\Controllers\Admin\SliderController::class, 'create']);
    Route::post('create_slider', [\App\Http\Controllers\Admin\SliderController::class, 'store']);

    Route::delete('delete_slider/{id}', [\App\Http\Controllers\Admin\SliderController::class, 'destroy']);

    Route::get('slider/edit/{id}', [\App\Http\Controllers\Admin\SliderController::class, 'edit']);
    Route::put('update_slider/{id}', [\App\Http\Controllers\Admin\SliderController::class, 'update']);

});
