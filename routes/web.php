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



Route::group(['prefix' => 'admin', 'namespace'=> 'Admin'], function() {
    Route::get('/', function() {
        return redirect()->route('admin.dashboard');
    })->name('admin.category.index');

    Route::get('/dashboard', function () {
        return view('admin.layouts.categories.list');
    })->name('admin.dashboard');
    
    Route::group(['prefix' => 'category'], function() {
        
        Route::get('/', function() {
            return redirect()->route('admin.category.list');
        })->name('admin.category.index');
        
        Route::get('/list', 'CategoryController@index')->name('admin.category.list');
        Route::get('/create', 'CategoryController@create')->name('admin.category.create');
        Route::post('/store', 'CategoryController@store')->name('admin.category.store');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('admin.category.edit');
        Route::post('/update/{id}', 'CategoryController@update')->name('admin.category.update');
        Route::get('/delete/{id}', 'CategoryController@destroy')->name('admin.category.delete');
    });

    
    Route::group(['prefix' => 'product'], function() {
        Route::get('/', function() {
            return redirect()->route('admin.product.list');
        })->name('admin.product.index');
        
        Route::get('/list', 'ProductController@index')->name('admin.product.list');
        Route::get('/create', 'ProductController@create')->name('admin.product.create');
        Route::post('/store', 'ProductController@store')->name('admin.product.store');
        Route::get('/edit/{id}', 'ProductController@edit')->name('admin.product.edit');
        Route::post('/update/{id}', 'ProductController@update')->name('admin.product.update');
        Route::get('/delete/{id}', 'ProductController@destroy')->name('admin.product.delete');
    });
    
    Route::group(['prefix' => 'attribute'], function() {
        Route::get('/', function() {
            return redirect()->route('admin.attribute.list');
        })->name('admin.attribute.index');
        
        Route::get('/list', 'AttributeController@index')->name('admin.attribute.list');
        Route::get('/create', 'AttributeController@create')->name('admin.attribute.create');
        Route::post('/store', 'AttributeController@store')->name('admin.attribute.store');
        Route::get('/edit/{id}', 'AttributeController@edit')->name('admin.attribute.edit');
        Route::post('/update/{id}', 'AttributeController@update')->name('admin.attribute.update');
        Route::get('/delete/{id}', 'AttributeController@destroy')->name('admin.attribute.delete');
    });
    
});
