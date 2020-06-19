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

Route::get('/',[
'uses'=>'ProductController@getproducts',
'as'=>'product.index'

]);



Route::get('/add-to-cart/{id}',[
'uses'=>'ProductController@getAddToCart',
'as'=>'product.addToCart'

]);

Route::get('/reduce/{id}',[
'uses'=>'ProductController@getReducebyOne',
'as'=>'product.reduceByOne'
]);


Route::get('/remove/{id}',[
'uses'=>'ProductController@getRemoveItem',
'as'=>'product.remove'
]);


Route::get('/shopping-cart',[
'uses'=>'ProductController@getCart',
'as'=>'product.shoppingcart'

]);

Route::get('/checkout',[
'uses'=>'ProductController@getcheckout',
'as'=>'checkout',
'middleware'=>'auth'

]);


Route::post('/checkout',[
'uses'=>'ProductController@postcheckout',
'as'=>'checkout',
'middleware'=>'auth'
]);


Route::group(['prefix'=>'user'],function()
{

  Route::group(['middleware'=>'guest'],function()
  {
  Route::post('/signup',[
  'uses'=>'UserController@postsignup',
  'as'=>'user.signup'

  ]);
  Route::get('/signin',[
  'uses'=>'UserController@getsignin',
  'as'=>'user.signin'

  ]);
  Route::post('/signin',[
  'uses'=>'UserController@postsignin',
  'as'=>'user.signin'

  ]);
  Route::get('/signup',[
  'uses'=>'UserController@getsignup',
  'as'=>'user.signup'

  ]);



});

Route::group(['middleware'=>'auth'],function()
{

Route::get('/profile',[
'uses'=>'UserController@getprofile',
'as'=>'user.profile'

]);
Route::get('/logout',[
'uses'=>'UserController@logout',
'as'=>'user.logout'

]);

});

});
