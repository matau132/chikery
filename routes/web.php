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

//site
Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
//site shop
Route::group(['prefix'=>'shop'],function(){
	Route::get('/','HomeController@shop')->name('shop');
	Route::get('/{id}-{name}', 'HomeController@shop_cat')->name('shop.category');
	Route::get('/{id}_{name}', 'HomeController@shop_ingre')->name('shop.ingredient');
	Route::get('/product/{id}-{name}','HomeController@shop_detail')->name('shop.detail');
});
//site user
Route::group(['prefix'=>'user'],function(){
	Route::get('/login', 'HomeController@user_login')->name('user.login');
	Route::post('/login', 'HomeController@post_user_login');
	Route::get('/register', 'HomeController@user_register')->name('user.register');
	Route::post('/register', 'HomeController@post_user_register');
	Route::get('/logout', 'HomeController@user_logout')->name('user.logout');
});
//site cart
Route::group(['prefix'=>'cart'],function(){
	Route::get('/', 'HomeController@cart')->name('cart');
	Route::get('/add/{id}-{size_id}', 'HomeController@cart_add')->name('cart.add');
	// Route::get('/update', 'HomeController@cart_update')->name('cart.update');
	Route::get('/remove/{id}-{size_id}', 'HomeController@cart_remove')->name('cart.remove');
});

Route::get('/checkout', 'HomeController@checkout')->name('checkout')->middleware('customer');
Route::get('/whishlist', 'HomeController@whishlist')->name('whishlist');
Route::get('/blog', 'HomeController@blog')->name('blog');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/search', 'HomeController@search')->name('search');
Route::get('/404','HomeController@error')->name('error');




//admin
Route::get('/admin/login','AdminController@login')->name('admin.login');
Route::post('/admin/login','AdminController@post_login');
Route::get('/admin/logout','AdminController@logout')->name('admin.logout');

Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){
	//index
	Route::get('/','AdminController@index')->name('admin.index');
	
	Route::get('/uploads','AdminController@upload')->name('admin.upload');

    //product
    Route::group(['prefix'=>'product'],function(){
		Route::get('/','AdminController@product')->name('admin.Product');
		Route::get('/add','AdminController@addProduct')->name('admin.addProduct');
		Route::post('/add','AdminController@post_addproduct');
		Route::get('/update/{id}','AdminController@update_product')->name('admin.updateProduct');
		Route::post('/update/{id}','AdminController@post_update_product');
		Route::get('/delete/{id}','AdminController@delete_product')->name('admin.deleteProduct');
    });

    //category
    Route::group(['prefix'=>'category'],function(){
		Route::get('/','AdminController@category')->name('admin.Category');
  		Route::get('/add','AdminController@addcategory')->name('admin.addCategory');
		Route::post('/add','AdminController@post_addcategory');
		Route::get('/update/{id}','AdminController@update_category')->name('admin.updateCategory');
		Route::post('/update/{id}','AdminController@post_update_category');
		Route::get('/delete/{id}','AdminController@delete_category')->name('admin.deleteCategory');
    });
    
    //blog
    Route::group(['prefix'=>'blog'],function(){
		Route::get('/','AdminController@blog')->name('admin.Blog');
		Route::get('/add','AdminController@addblog')->name('admin.addBlog');
		Route::post('/add','AdminController@post_addblog');
		Route::get('/update/{id}','AdminController@update_blog')->name('admin.updateBlog');
		Route::post('/update/{id}','AdminController@post_update_blog');
		Route::get('/delete/{id}','AdminController@delete_blog')->name('admin.deleteBlog');
	});

	//banner
    Route::group(['prefix'=>'banner'],function(){
		Route::get('/','AdminController@banner')->name('admin.Banner');
		Route::get('/add','AdminController@addbanner')->name('admin.addBanner');
		Route::post('/add','AdminController@post_addbanner');
		Route::get('/update/{id}','AdminController@update_banner')->name('admin.updateBanner');
		Route::post('/update/{id}','AdminController@post_update_banner');
		Route::get('/delete/{id}','AdminController@delete_banner')->name('admin.deleteBanner');
	});

	//ingredient
	Route::group(['prefix'=>'ingredient'],function(){
		Route::get('/','AdminController@ingredient')->name('admin.Ingredient');
		Route::get('/add','AdminController@addIngredient')->name('admin.addIngredient');
		Route::post('/add','AdminController@post_addIngredient');
		Route::get('/update/{id}','AdminController@updateIngredient')->name('admin.updateIngredient');
		Route::post('/update/{id}','AdminController@post_updateIngredient');
		Route::get('/delete/{id}','AdminController@deleteIngredient')->name('admin.deleteIngredient');
	});

	//product detail
	Route::group(['prefix'=>'product-detail'],function(){
		Route::get('/','AdminController@product_detail')->name('admin.product_detail');
	});

	//size
	Route::group(['prefix'=>'size'],function(){
		Route::get('/','AdminController@size')->name('admin.Size');
		Route::get('/add','AdminController@addSize')->name('admin.addSize');
		Route::post('/add','AdminController@post_addSize');
		Route::get('/update/{id}','AdminController@updateSize')->name('admin.updateSize');
		Route::post('/update/{id}','AdminController@post_updateSize');
		Route::get('/delete/{id}','AdminController@deleteSize')->name('admin.deleteSize');
	});

	//size detail
	Route::group(['prefix'=>'size-detail'],function(){
		Route::get('/','AdminController@size_detail')->name('admin.size_detail');
	});

	//user
	Route::group(['prefix'=>'user'],function(){
		Route::get('/','AdminController@user')->name('admin.User');
		Route::get('/add','AdminController@adduser')->name('admin.addUser');
		Route::post('/add','AdminController@post_adduser');
		Route::get('/update/{id}','AdminController@update_user')->name('admin.updateUser');
		Route::post('/update/{id}','AdminController@post_update_user');
		Route::get('/update/change_password/{id}','AdminController@change_user_pw')->name('admin.UserPW');
		Route::post('/update/change_password/{id}','AdminController@post_change_user_pw');
		Route::get('/delete/{id}','AdminController@delete_user')->name('admin.deleteUser');
	});

	//admin
	Route::group(['prefix'=>'ad'],function(){
		Route::get('/','AdminController@admin')->name('admin.Admin');
		Route::get('/add','AdminController@addadmin')->name('admin.addAdmin');
		Route::post('/add','AdminController@post_addadmin');
		Route::get('/update/{id}','AdminController@update_admin')->name('admin.updateAdmin');
		Route::post('/update/{id}','AdminController@post_update_admin');
		Route::get('/update/change_password/{id}','AdminController@change_admin_pw')->name('admin.AdminPW');
		Route::post('/update/change_password/{id}','AdminController@post_change_admin_pw');
		Route::get('/delete/{id}','AdminController@delete_admin')->name('admin.deleteAdmin');
	});
});