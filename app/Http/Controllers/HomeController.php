<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\Helpers\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Customer;
use App\Models\Size;
use App\Models\Size_detail;
use App\Models\Blog;
use App\Http\Requests\User\UserRequestLogin;
use App\Http\Requests\User\UserRequestAdd;
use App\Http\Requests\User\UserRequestUpdate;
use App\Http\Requests\User\UserRequestChangePW;

class HomeController extends Controller
{
    protected $cats;
    protected $ingre;
    protected $recent_prods;
    public function __construct()
    {
        $this->cats = Category::orderBy('name','ASC')->get();
        $this->ingre = Ingredient::orderBy('name','ASC')->get();
        $this->recent_prods = Product::orderBy('created_at','desc')->limit(3)->get();
    }

    public function index(Size_detail $size_dt){
        $pros = Product::orderBy('created_at','desc')->limit(4)->get();
    	return view('home',compact('pros','size_dt'));
    }
    public function about(){
    	return view('about.about');
    }
    public function shop(Size_detail $size_dt){
        $pros = Product::orderby('name','asc')->paginate(6);
        $ingre_id = 0;
    	return view('shop.shop_product',[
            'cats' => $this->cats,
            'ingre' => $this->ingre,
            'pros' => $pros,
            'ingre_id' => $ingre_id,
            'recent_prods' => $this->recent_prods,
            'size_dt' => $size_dt
            ]);
    }
    public function shop_cat($id,$name,Size_detail $size_dt){
        $pros = Product::where('category_id',$id)->paginate(6);
        $ingre_id = 0;
        if($pros){
            return view('shop.shop_product',[
                'cats' => $this->cats,
                'ingre' => $this->ingre,
                'pros' => $pros,
                'ingre_id' => $ingre_id,
                'recent_prods' => $this->recent_prods,
                'size_dt' => $size_dt
                ]);
        }
        else{
            return redirect()->route('error');
        }
    }
    public function shop_ingre($id,$name,Size_detail $size_dt){
        $prod = Ingredient::find($id);
        $ingre_id = $id;
        if($prod){
            $pros = $prod->products->paginate(6);
            return view('shop.shop_product',[
                'cats' => $this->cats,
                'ingre' => $this->ingre,
                'pros' => $pros,
                'ingre_id' => $ingre_id,
                'recent_prods' => $this->recent_prods,
                'size_dt' => $size_dt
                ]);
        }
        else{
            return redirect()->route('error');
        }
    }
    public function shop_detail($id,$name,Size_detail $size_dt)
    {
        $pro = Product::find($id);
        if($pro){
            $relate_pro = Product::where('category_id',$pro->category_id)->limit(4)->get();
            return view('product.product-detail',compact('pro','relate_pro','size_dt'));
        }
        else{
            return redirect()->route('error');
        }
    }
    public function search(Request $request,Size_detail $size_dt)
    {
        $pros = Product::where('name','like','%'.$request->key_word.'%')->paginate(6);
        $ingre_id = 0;
        return view('shop.shop_product',[
            'cats' => $this->cats,
            'ingre' => $this->ingre,
            'pros' => $pros,
            'ingre_id' => $ingre_id,
            'recent_prods' => $this->recent_prods,
            'size_dt' => $size_dt
            ]);
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

//cart  
    public function cart(Cart $cart,Size $size){
        $cart_items = $cart->items;
        // dd($cart_items);
        return view('cart.cart',compact('cart_items','size'));
    }
    public function cart_add($id,$size_id,Cart $cart){
        $pro = Product::find($id);
        $cart->add($pro,$size_id);
        return redirect()->back();
    }
    public function cart_update(Request $request,Cart $cart)
    {
        $cart->update($request);
        return redirect()->back()->with('success','Your cart has been updated!');
    }
    public function cart_remove($id,$size_id,Cart $cart)
    {
        $cart->remove($id,$size_id);
        return redirect()->back();
    }
    public function cart_clear()
    {
        session()->forget('cart');
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
}
