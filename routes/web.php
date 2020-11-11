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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/shop', 'HomeController@shop')->name('shop');
Route::get('/checkout', 'HomeController@checkout')->name('checkout');
Route::get('/whishlist', 'HomeController@whishlist')->name('whishlist');
Route::get('/blog', 'HomeController@blog')->name('blog');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/cart', 'HomeController@cart')->name('cart');



//admin
Route::group(['prefix'=>'admin'],function(){
	//index
	Route::get('/','AdminController@index')->name('admin.index');
    
    //product
    Route::group(['prefix'=>'product'],function(){
		Route::get('/','AdminController@product')->name('admin.product');
		Route::get('/add-product','AdminController@addproduct')->name('admin.addproduct');
		Route::post('/add-product','AdminController@post_addproduct');
    });

    //category
    Route::group(['prefix'=>'category'],function(){
		Route::get('/','AdminController@category')->name('admin.category');
  		Route::get('/add-category','AdminController@addcategory')->name('admin.addcategory');
  		Route::post('/add-category','AdminController@post_addcategory');
    });

    //user
	Route::get('/user','AdminController@user')->name('admin.user');
    
    //blog
    Route::group(['prefix'=>'blog'],function(){
		Route::get('/','AdminController@blog')->name('admin.blog');
		Route::get('/add-blog','AdminController@addblog')->name('admin.addblog');
		Route::post('/add-blog','AdminController@post_addblog');
	});

	//banner
    Route::group(['prefix'=>'banner'],function(){
		Route::get('/','AdminController@banner')->name('admin.banner');
		Route::get('/add-banner','AdminController@addbanner')->name('admin.addbanner');
		Route::post('/add-banner','AdminController@post_addbanner');
		
	});
});