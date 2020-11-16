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
		Route::get('/add','AdminController@addproduct')->name('admin.addproduct');
		Route::post('/add','AdminController@post_addproduct');
		Route::get('/update/{id}','AdminController@update_product')->name('admin.updateProduct');
		Route::post('/update/{id}','AdminController@post_update_product');
		Route::get('/delete/{id}','AdminController@delete_product')->name('admin.deleteProduct');
    });

    //category
    Route::group(['prefix'=>'category'],function(){
		Route::get('/','AdminController@category')->name('admin.category');
  		Route::get('/add','AdminController@addcategory')->name('admin.addcategory');
		Route::post('/add','AdminController@post_addcategory');
		Route::get('/update/{id}','AdminController@update_category')->name('admin.updateCategory');
		Route::post('/update/{id}','AdminController@post_update_category');
		Route::get('/delete/{id}','AdminController@delete_category')->name('admin.deleteCategory');
    });

    //user
	Route::get('/user','AdminController@user')->name('admin.user');
    
    //blog
    Route::group(['prefix'=>'blog'],function(){
		Route::get('/','AdminController@blog')->name('admin.blog');
		Route::get('/add','AdminController@addblog')->name('admin.addblog');
		Route::post('/add','AdminController@post_addblog');
		Route::get('/update/{id}','AdminController@update_blog')->name('admin.updateBlog');
		Route::post('/update/{id}','AdminController@post_update_blog');
		Route::get('/delete/{id}','AdminController@delete_blog')->name('admin.deleteBlog');
	});

	//banner
    Route::group(['prefix'=>'banner'],function(){
		Route::get('/','AdminController@banner')->name('admin.banner');
		Route::get('/add','AdminController@addbanner')->name('admin.addbanner');
		Route::post('/add','AdminController@post_addbanner');
		Route::get('/update/{id}','AdminController@update_banner')->name('admin.updateBanner');
		Route::post('/update/{id}','AdminController@post_update_banner');
		Route::get('/delete/{id}','AdminController@delete_banner')->name('admin.deleteBanner');
	});
});