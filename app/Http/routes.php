<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



    Route::get('/', ['as' => 'home', 'uses' => 'StoreController@index']);
    Route::get('/home', ['as' => 'home', 'uses' => 'StoreController@index']);

    Route::get('category/{id}', ['as' => 'store.category', 'uses' => 'StoreController@category']);
    Route::get('product/{id}', ['as' => 'store.product', 'uses' => 'StoreController@product']);
    Route::get('product/tag/{id}', ['as' => 'store.product.tag', 'uses' => 'StoreController@tag']);

    Route::get('cart', ['as' => 'cart', 'uses' => 'CartController@index']);
    Route::get('cart/add/{id}', ['as' => 'cart.add', 'uses' => 'CartController@add']);
    Route::get('cart/destroy/{id}', ['as' => 'cart.destroy', 'uses' => 'CartController@destroy']);
    Route::post('cart/change', ['as' => 'cart.change', 'uses' => 'CartController@change']);

    Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
    ]);

Route::group(['prefix'=>'admin'], function()

    {
        Route::group(['prefix'=>'categories'], function(){

            Route::get('', array('as' => 'categories', 'uses' => 'AdminCategoriesController@index'));
            Route::get('create', array('as' => 'categories.create', 'uses' => 'AdminCategoriesController@create'));
            Route::post('', array('as' => 'categories.post', 'uses' => 'AdminCategoriesController@store'));
            Route::get('{category}', array('as' => 'categories.show', 'uses' => 'AdminCategoriesController@show'));
            Route::get('{id}/edit', array('as' => 'categories.edit', 'uses' => 'AdminCategoriesController@edit'));
            Route::post('{id}/update', array('as' => 'categories.update','uses' => 'AdminCategoriesController@update'));
            Route::get('{id}/destroy', array('as' => 'categories.destroy', 'uses' => 'AdminCategoriesController@destroy'));
        });


        Route::group(['prefix'=>'products'], function(){

            Route::get('', array('as' => 'products','uses'=> 'AdminProductsController@index'));
            Route::get('create', array('as' => 'products.create','uses' => 'AdminProductsController@create'));
            Route::post('', array('as' => 'products.store', 'uses' => 'AdminProductsController@store'));
            Route::get('{product}', array('as' => 'products.show', 'uses' => 'AdminProductsController@show') );
            Route::get('{id}/edit', array('as' => 'products.edit', 'uses' => 'AdminProductsController@edit'));
            Route::post('{id}/update', array('as' => 'products.update', 'uses' => 'AdminProductsController@update'));
            Route::get('{id}/destroy', array('as' => 'products.destroy', 'uses' =>'AdminProductsController@destroy'));

            Route::group(['prefix'=>'images'], function(){

                Route::get( '{id}/product', ['as'=>'products.images','uses'=>'AdminProductsController@images']);
                Route::get( 'create/{id}/product', ['as'=>'products.images.create','uses'=>'AdminProductsController@createImage']);
                Route::post( 'store/{id}/product', ['as'=>'products.images.store','uses'=>'AdminProductsController@storeImage']);
                Route::get( 'destroy/{id}/image', ['as'=>'products.images.destroy','uses'=>'AdminProductsController@destroyImage']);

            });

    });

});



