<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'HomeController@home')->name('home');



//AREA ADMIN
Route::get('/admin', 'AdminController@home')->name('admin.home');

Route::get('/admin/categorías/', 'AdminController@category')->name('admin.category');

Route::get('/admin/articulos/', 'AdminController@articles')->name('admin.articles');
Route::get('/admin/articulos/crear', 'AdminController@articles_create')->name('admin.articles_create');

Route::get('/admin/productos/', 'AdminController@products')->name('admin.products');

Route::get('/admin/usuarios/', 'AdminController@users')->name('admin.users');

Route::get('/admin/ajustes/', 'AdminController@settings')->name('admin.settings');

//CATEGROIAS
Route::post('/admin/category/create', 'CategoryController@create')->name('category.create');

//PRODUCTOS
Route::post('/admin/productos/create', 'ProductController@create')->name('product.create');

//SETTINGS
Route::post('/admin/ajustes/updated', 'SettingController@updated')->name('setting.updated');

//ARTÍCULOS
Route::post('/admin/articles/create', 'ArticleController@create')->name('article.create');

//USUARIOS

Auth::routes();
