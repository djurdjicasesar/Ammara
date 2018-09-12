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
//Home page

Route::get('/', 'IndexController@index')->name('index');

Route::get('/products/{slug}','ProductsController@products')->name('products');
// Authorization
Route::get('login', 'Auth\SessionController@getLogin')->name('auth.login.form');
Route::post('login', 'Auth\SessionController@postLogin')->name('auth.login.attempt');
Route::any('logout', 'Auth\SessionController@getLogout')->name('auth.logout');

// Registration
Route::get('register', 'Auth\RegistrationController@getRegister')->name('auth.register.form');
Route::post('register', 'Auth\RegistrationController@postRegister')->name('auth.register.attempt');

// Activation
Route::get('activate/{code}', 'Auth\RegistrationController@getActivate')->name('auth.activation.attempt');
Route::get('resend', 'Auth\RegistrationController@getResend')->name('auth.activation.request');
Route::post('resend', 'Auth\RegistrationController@postResend')->name('auth.activation.resend');

// Password Reset
Route::get('password/reset/{code}', 'Auth\PasswordController@getReset')->name('auth.password.reset.form');
Route::post('password/reset/{code}', 'Auth\PasswordController@postReset')->name('auth.password.reset.attempt');
Route::get('password/reset', 'Auth\PasswordController@getRequest')->name('auth.password.request.form');
Route::post('password/reset', 'Auth\PasswordController@postRequest')->name('auth.password.request.attempt');

// Users
Route::resource('users', 'UserController');

// Roles
Route::resource('roles', 'RoleController');

// Dashboard
Route::get('dashboard', function () {
    return view('Centaur::dashboard');
})->name('dashboard');

//Add Categories
Route::match(['get','post'], 'add_category', 'CategoryController@addCategory')->name('add_category');
Route::get('view_categories','CategoryController@viewCategories')->name('view_categories');

//Products

Route::match(['get','post'],'add_product','ProductsController@addProduct')->name('add_product');
Route::get('view_products', 'ProductsController@viewProducts')->name('view_products');

// Add to cart

Route::match(['get','post'], '/add_cart','ProductsController@addToCart')->name('add_cart');
Route::resource('cart', 'CartController');
