<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
    	return view('home');
    }
    public function about(){
    	return view('about.about');
    }
    public function shop(){
    	return view('shop.shop');
    }
    public function checkout(){
    	return view('checkout.checkout');
    }
    public function whishlist(){
    	return view('whishlist.whishlist');
    }
    public function blog(){
    	return view('blog.blog-grid');
    }
    public function contact(){
    	return view('contact.contact');
    }
    public function cart(){
    	return view('cart.cart');
    }
}
