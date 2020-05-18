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


Route::get('category/{id}', 'frontend\CateController@index')->name('cate');
Route::get('subcategory/{id}', 'frontend\SubController@index')->name('sub');
Route::get('product/{id}', 'frontend\ProductController@index')->name('product');
Route::get('search', 'frontend\SearchController@index')->name('search');
Route::get('carrito', 'frontend\CarritoController@index')->name('carrito');
Route::get('profile', 'frontend\ProfileController@index')->name('profile');
Route::get('sales', 'frontend\SalesController@index')->name('sales');
Route::get('history', 'frontend\HistoryController@index')->name('history');
Route::get('carritoadd/{id}', 'frontend\ProductController@store')->name('carritoadd');
Route::get('deleteCarrito/{id}', 'frontend\ProductController@deleteCarrito')->name('deleteCarrito');






// Route::get('product/{id}', 'HomeController@product')->name('product');
// Route::post('product', 'HomeController@product')->name('product');


Route::prefix('admin')->group(function () {
    Route::middleware(['auth'])->group(function () {
         Route::middleware(['checkAdmin'])->group(function () {

            Route::get('upload-image','ProductsController@image');
            Route::post('upload-image',['as'=>'image.upload','uses'=>'admin\ProductsController@uploadImages']);

            Route::resource('user', 'admin\UserController');

            Route::get('indexImages/{product_id}', 'admin\ProductsController@indexImages')->name('indexImages');
            Route::post('addImage', 'admin\ProductsController@addImage')->name('addImage');
            Route::delete('deleteImage/{id}', 'admin\ProductsController@deleteImage')->name('deleteImage');

            Route::resource('categories', 'admin\CategoriesController');
            Route::post('category_visible', 'admin\CategoriesController@setCategoryVisible')->name('category_visible');
            Route::post('subcategory_visible', 'admin\SubController@setSubcategoryVisible')->name('subcategory_visible');
            Route::post('product_visible', 'admin\ProductsController@setProductVisible')->name('product_visible');
           
            
            Route::resource('products', 'admin\ProductsController');
            Route::resource('sub', 'admin\SubController');
        });
    // });
      
    });
});


Route::middleware(['auth'])->group(function () {
    Route::get('favorites', 'frontend\FavoritesController@index')->name('favorites');
    Route::get('favoritesAction/{id}', 'frontend\FavoritesController@favoritesAction')->name('favoritesAction');
    
});

Route::get('getSub_CategoriesByCategory', 'admin\SubController@getSub_CategoriesByCategory')->name('getSub_CategoriesByCategory');