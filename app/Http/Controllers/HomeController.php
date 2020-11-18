<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(){
        $pros = Product::paginate(4);
    	return view('home',compact('pros'));
    }
    public function about(){
    	return view('about.about');
    }
    public function shop(){
        $pros = Product::all();
    	return view('shop.shop',compact('pros'));
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
