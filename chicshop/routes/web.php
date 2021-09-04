<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
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

Route::get('/', "App\Http\Controllers\HomeController@index");
Route::get('/contactus', "App\Http\Controllers\HomeController@contactUs");
Route::get('/aboutus', "App\Http\Controllers\HomeController@aboutUs");
Route::get('/blog', "App\Http\Controllers\HomeController@blog");
Route::prefix('/admin')->namespace("App\Http\Controllers\Admin")->middleware('auth')->group(function(){
    Route::get('/products',"ProductController@index");
    Route::get('/products/create', "ProductController@create");
    Route::post('/products/create', "ProductController@store"); 
    Route::get('/products/{id}/edit',"ProductController@edit");
    Route::post('/products/{id}/edit',"ProductController@update");
    Route::delete('/products/{id}',"ProductController@delete");
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
