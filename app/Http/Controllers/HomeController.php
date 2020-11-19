<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(){
        $pros = Product::inRandomOrder()->limit(4)->get();

    	return view('home',compact('pros'));
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
