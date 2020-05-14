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
    return redirect('/home');
});

Route::get('/admin', function () {
    return redirect('/admin/user');
});

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
//Route::get('agregarfoto', 'admin\ProductsController@agregarfoto');

Route::get('home', 'HomeController@index')->name('home');
Route::resource('loguser', 'frontend\LoguserController');
Route::resource('register', 'frontend\RegisterController');

Route::resource('product', 'frontend\ProductController');


Route::prefix('admin')->group(function () {
    Route::middleware(['auth'])->group(function () {
         Route::middleware(['checkAdmin'])->group(function () {

            Route::get('upload-image','ProductsController@image');
            Route::post('upload-image',['as'=>'image.upload','uses'=>'admin\ProductsController@uploadImages']);

            Route::resource('user', 'admin\UserController');
            Route::resource('Image', 'admin\ ImageController');
            Route::resource('categories', 'admin\CategoriesController');
            Route::post('category_visible', 'admin\CategoriesController@setCategoryVisible')->name('category_visible');
            Route::post('subcategory_visible', 'admin\SubController@setSubcategoryVisible')->name('subcategory_visible');
            
            Route::resource('products', 'admin\ProductsController');
            Route::resource('sub', 'admin\SubController');
        });
    // });
      
    });
});


Route::middleware(['auth'])->group(function () {
    Route::middleware(['checkUser'])->group(function () {
        
        
    });
});
Route::post('addImage', 'admin\ProductsController@addImage')->name('addImage');
Route::get('getSub_CategoriesByCategory', 'admin\SubController@getSub_CategoriesByCategory')->name('getSub_CategoriesByCategory');