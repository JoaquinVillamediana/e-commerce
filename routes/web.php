<?php

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
    return redirect('home');
});

Route::get('/admin', function () {
    return redirect('/admin/user');
});

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');



Route::prefix('admin')->group(function () {
    Route::middleware(['auth'])->group(function () {
         Route::middleware(['checkAdmin'])->group(function () {
            
            Route::resource('user', 'admin\UserController');
            Route::resource('categories', 'admin\CategoriesController');
            Route::post('category_visible', 'admin\CategoriesController@setCategoryVisible')->name('category_visible');
            Route::resource('products', 'admin\ProductsController');
            Route::resource('sub', 'admin\SubController');
        });
    // });
      
    });
});


Route::middleware(['auth'])->group(function () {
    Route::middleware(['checkUser'])->group(function () {
        Route::get('home', 'HomeController@index')->name('home');
        
    });
});

Route::get('getSub_CategoriesByCategory', 'admin\SubController@getSub_CategoriesByCategory')->name('getSub_CategoriesByCategory');