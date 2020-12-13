<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\Models\Product;
use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Customer;
use App\Http\Requests\User\UserRequestLogin;
use App\Http\Requests\User\UserRequestAdd;
use App\Http\Requests\User\UserRequestUpdate;
use App\Http\Requests\User\UserRequestChangePW;

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
        $pros = Product::orderby('name','asc')->paginate(6);
        $cats = Category::orderBy('name','ASC')->get();
        $ingre = Ingredient::orderBy('name','ASC')->get();
        $recent_prods = Product::orderBy('created_at','desc')->limit(3)->get();
        $ingre_id = 0;
    	return view('shop.shop_product',compact('cats','ingre','pros','ingre_id','recent_prods'));
    }
    public function shop_cat($id,$name){
        $pros = Product::where('category_id',$id)->paginate(6);
        $cats = Category::orderBy('name','ASC')->get();
        $ingre = Ingredient::orderBy('name','ASC')->get();
        $recent_prods = Product::orderBy('created_at','desc')->limit(3)->get();
        $ingre_id = 0;
        if($pros){
            return view('shop.shop_product',compact('cats','ingre','pros','ingre_id','recent_prods'));
        }
        else{
            return redirect()->route('error');
        }
    }
    public function shop_ingre($id,$name){
        $prod = Ingredient::find($id);
        $cats = Category::orderBy('name','ASC')->get();
        $ingre = Ingredient::orderBy('name','ASC')->get();
        $recent_prods = Product::orderBy('created_at','desc')->limit(3)->get();
        $ingre_id = $id;
        if($prod){
            $pros = $prod->products->paginate(6);
            return view('shop.shop_product',compact('cats','ingre','pros','ingre_id','recent_prods'));
        }
        else{
            return redirect()->route('error');
        }
    }
    public function shop_detail($id,$name)
    {
        $pro = Product::find($id);
        if($pro){
            $relate_pro = Product::where('category_id',$pro->category_id)->limit(4)->get();
            return view('product.product-detail',compact('pro','relate_pro'));
        }
        else{
            return redirect()->route('error');
        }
    }
    public function search(Request $request)
    {
        $pros = Product::where('name','like','%'.$request->key_word.'%')->paginate(6);
        $cats = Category::orderBy('name','ASC')->get();
        $ingre = Ingredient::orderBy('name','ASC')->get();
        $recent_prods = Product::orderBy('created_at','desc')->limit(3)->get();
        $ingre_id = 0;
        return view('shop.shop_product',compact('cats','ingre','pros','ingre_id','recent_prods'));
    }
    public function error()
    {
        return view('error.error');
    }
//user    
    public function user_login(Request $request)
    {
        if (session('link')) {
            $myPath     = session('link');
            $loginPath  = url('/user/login');
            $previous   = url()->previous();
            if ($previous == $loginPath) {
                session(['link' => $myPath]);
            }
            else{
                session(['link' => $previous]);
            }
        }
        else{
             session(['link' => url()->previous()]);
        }
        return view('user.login');
    }
    public function post_user_login(UserRequestLogin $request,Customer $user)
    {
        if($user->login($request)){
            return redirect(session('link'));
        }
        else{
            return redirect()->back()->with('error','Incorect Email or Password!');
        }
    }
    public function user_register()
    {
        return view('user.register');
    }
    public function post_user_register(UserRequestAdd $request,Customer $user)
    {
        $user->add($request);
        return redirect(session('link'));
    }
    public function user_logout()
    {
        Auth::guard('customer')->logout();
        return redirect()->back();
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
