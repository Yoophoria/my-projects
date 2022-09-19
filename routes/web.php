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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
Route::resource('posts', 'PostsController');
Route::resource('products', 'ProductsController');

Route::get('cart', 'ProductsController@cart');
Route::get('cartt', 'ProductsController@cartt');
Route::get('add-to-cart/{id}', 'ProductsController@addToCart');

Route::post('update-cart','ProductsController@update');

Route::delete('remove-from-cart', 'ProductsController@remove');

Route::post('test','ProductsController@test_api');


/*
Route::get('/about', function () {
    return view('pages.about');
});*/

Route::get('/users/{id}', function ($id) {
    return 'This is a user ' . $id;
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::group(
//     ['namespace' => 'Admin', 'prefix' => 'admin'],
//     function () {
//         Route::get('dashboard', 'DashboardController@index');
//     }
// );
