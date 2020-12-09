<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Ingredient;

class HomeController extends Controller
{
    public function index(){
        $pros = Product::orderBy('created_at','desc')->limit(4)->get();

    	return view('home',compact('pros'));
    }
    public function about(){
    	return view('about.about');
    }
    public function shop(){
        $cats = Category::orderBy('name','ASC')->get();
        $ingre = Ingredient::orderBy('name','ASC')->get();
        $pros = Product::orderby('name','asc')->paginate(6);
        $recent_prods = Product::orderBy('created_at','desc')->limit(3)->get();
        $ingre_id = 0;
    	return view('shop.shop_product',compact('cats','ingre','pros','ingre_id','recent_prods'));
    }
    public function shop_cat($id,$name){
        $cats = Category::orderBy('name','ASC')->get();
        $ingre = Ingredient::orderBy('name','ASC')->get();
        $pros = Product::where('category_id',$id)->paginate(6);
        $recent_prods = Product::orderBy('created_at','desc')->limit(3)->get();
        $ingre_id = 0;
        return view('shop.shop_product',compact('cats','ingre','pros','ingre_id','recent_prods'));
    }
    public function shop_ingre($id,$name){
        $cats = Category::orderBy('name','ASC')->get();
        $ingre = Ingredient::orderBy('name','ASC')->get();
        $pros = Ingredient::find($id)->products->paginate(6);
        $recent_prods = Product::orderBy('created_at','desc')->limit(3)->get();
        $ingre_id = $id;
        return view('shop.shop_product',compact('cats','ingre','pros','ingre_id','recent_prods'));
    }
    public function shop_detail($id,$name)
    {
        $pro = Product::find($id);
        $relate_pro = Product::where('category_id',$pro->category_id)->limit(4)->get();
        return view('product.product-detail',compact('pro','relate_pro'));
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
