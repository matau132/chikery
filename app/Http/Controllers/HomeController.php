<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use DB;
use App\Helpers\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Customer;
use App\Models\Size;
use App\Models\Size_detail;
use App\Models\Blog;
use App\Models\Shipping;
use App\Models\Payment;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Whishlist;
use App\Http\Requests\User\UserRequestLogin;
use App\Http\Requests\User\UserRequestAdd;
use App\Http\Requests\User\UserRequestUpdate;
use App\Http\Requests\User\UserRequestChangePW;
use App\Http\Requests\Order\OrderRequestCreate;

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

//shop
    public function shop(Size_detail $size_dt, Request $request){
        if(isset($request->sort)){
            $sort = $request->sort;
            if($sort=='nameA-Z'){
                $pros = Size_detail::join('products','products.id','=','product_id')->select('size_details.*',DB::raw('products.name as product_name'))->get()->unique('product_id')->sortBy('product_name')->paginate(6);
            }
            elseif($sort=='nameZ-A'){
                $pros = Size_detail::join('products','products.id','=','product_id')->select('size_details.*',DB::raw('products.name as product_name'))->get()->unique('product_id')->sortByDesc('product_name')->paginate(6);
            }
            elseif($sort=='priceLow-High'){
                $pros = Size_detail::select('*',DB::raw('coalesce(sale_price,price) as current_price'))->get()->unique('product_id')->sortBy('current_price')->paginate(6);
            }
            elseif($sort=='priceHigh-Low'){
                $pros = Size_detail::select('*',DB::raw('coalesce(sale_price,price) as current_price'))->get()->unique('product_id')->orderByDesc('current_price')->paginate(6);
            }
            else{
                return redirect()->route('error');
            }
        }
        elseif(isset($request->filterMin)){
            $pros = Size_detail::select('*',DB::raw('coalesce(sale_price,price) as current_price'))->having('current_price','>',$request->filterMin)->having('current_price','<',$request->filterMax)->get()->unique('product_id')->paginate(6);
        }
        else{
            $pros = Size_detail::join('products','products.id','=','product_id')->select('size_details.*',DB::raw('products.created_at as product_created'))->get()->unique('product_id')->sortByDesc('product_created')->paginate(6);
        }
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
    public function shop_cat($id,$name,Size_detail $size_dt,Request $request){
        if(isset($request->sort)){
            $sort = $request->sort;
            if($sort=='nameA-Z'){
                $pros = Size_detail::join('products','products.id','=','product_id')->select('size_details.*',DB::raw('products.name as product_name'))->where('category_id',$id)->get()->unique('product_id')->sortBy('product_name')->paginate(6);
            }
            elseif($sort=='nameZ-A'){
                $pros = Size_detail::join('products','products.id','=','product_id')->select('size_details.*',DB::raw('products.name as product_name'))->where('category_id',$id)->get()->unique('product_id')->sortByDesc('product_name')->paginate(6);
            }
            elseif($sort=='priceLow-High'){
                $pros = Size_detail::join('products','products.id','=','product_id')->select('size_details.*',DB::raw('coalesce(sale_price,price) as current_price'))->where('category_id',$id)->get()->unique('product_id')->sortBy('current_price')->paginate(6);
            }
            elseif($sort=='priceHigh-Low'){
                $pros = Size_detail::join('products','products.id','=','product_id')->select('size_details.*',DB::raw('coalesce(sale_price,price) as current_price'))->where('category_id',$id)->get()->unique('product_id')->sortByDesc('current_price')->paginate(6);
            }
            else{
                return redirect()->route('error');
            }
        }
        elseif(isset($request->filterMin)){
            $pros = Size_detail::join('products','products.id','=','product_id')->select('size_details.*',DB::raw('coalesce(sale_price,price) as current_price'))->where('category_id',$id)->having('current_price','>',$request->filterMin)->having('current_price','<',$request->filterMax)->get()->unique('product_id')->paginate(6);
        }
        else{
            $pros = Size_detail::join('products','products.id','=','product_id')->select('size_details.*',DB::raw('products.created_at as product_created'))->where('category_id',$id)->get()->unique('product_id')->sortByDesc('product_created')->paginate(6);
        }
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
    public function shop_ingre($id,$name,Size_detail $size_dt,Request $request){
        $prod = Ingredient::find($id);
        $ingre_id = $id;
        if($prod){
            if(isset($request->sort)){
                $sort = $request->sort;
                if($sort=='nameA-Z'){
                    $pros = Size_detail::join('products','products.id','=','product_id')->join('product_details','product_details.product_id','=','products.id')->select('size_details.*',DB::raw('products.name as product_name'))->where('ingredient_id',$ingre_id)->get()->unique('product_id')->sortBy('product_name')->paginate(6);
                }
                elseif($sort=='nameZ-A'){
                    $pros = Size_detail::join('products','products.id','=','product_id')->join('product_details','product_details.product_id','=','products.id')->select('size_details.*',DB::raw('products.name as product_name'))->where('ingredient_id',$ingre_id)->get()->unique('product_id')->sortBy('product_name')->paginate(6);
                }
                elseif($sort=='priceLow-High'){
                    $pros = Size_detail::join('products','products.id','=','product_id')->join('product_details','product_details.product_id','=','products.id')->select('size_details.*',DB::raw('coalesce(sale_price,price) as current_price'))->where('ingredient_id',$ingre_id)->get()->unique('product_id')->sortBy('current_price')->paginate(6);
                }
                elseif($sort=='priceHigh-Low'){
                    $pros = Size_detail::join('products','products.id','=','product_id')->join('product_details','product_details.product_id','=','products.id')->select('size_details.*',DB::raw('coalesce(sale_price,price) as current_price'))->where('ingredient_id',$ingre_id)->get()->unique('product_id')->sortByDesc('current_price')->paginate(6);
                }
                else{
                    return redirect()->route('error');
                }
            }
            elseif(isset($request->filterMin)){
                $pros = Size_detail::join('products','products.id','=','product_id')->join('product_details','product_details.product_id','=','products.id')->select('size_details.*',DB::raw('coalesce(sale_price,price) as current_price'))->where('ingredient_id',$ingre_id)->having('current_price','>',$request->filterMin)->having('current_price','<',$request->filterMax)->get()->unique('product_id')->paginate(6);
            }
            else{
                $pros = Size_detail::join('products','products.id','=','product_id')->join('product_details','product_details.product_id','=','products.id')->select('size_details.*',DB::raw('products.created_at as product_created'))->where('ingredient_id',$ingre_id)->get()->unique('product_id')->sortByDesc('product_created')->paginate(6);
            }
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

    public function shop_order(Request $request,Cart $cart)
    {
        $request->validate([
            'quantity' => 'required|numeric|min:1'
        ]);
        $cart->order($request->product,$request->size,$request->quantity);
        return redirect()->route('cart')->with('success','Your order has been added to cart!');
    }

//user    
    public function user_login(Request $request)
    {
        if (session('link')) {
            $myPath     = session('link');
            $loginPath  = url('/login');
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
    public function user_profile()
    {
        return view('user.profile');
    }
    public function post_user_profile(UserRequestUpdate $request,Customer $user)
    {
        $user->edit($request->id,$request);
        return redirect()->back()->with('success','Your information has been saved!');
    }
    public function user_order(Order_detail $order_dt)
    {
        $orders = Auth::guard('customer')->user()->order->sortByDesc('updated_at');
        return view('user.order',compact('orders','order_dt'));
    }
    public function user_order_detail($id)
    {
        $order = Order::find($id);
        if($order){
            $order_dt = Order_detail::where('order_id',$id)->get();
            return view('user.order_detail',compact('order','order_dt'));
        }
        else{
            return view('error.error');
        }
    }
    public function user_order_cancel($id)
    {
        Order::find($id)->update([
            'status' => 4
        ]);
        return redirect()->route('user.order')->with('success','Your order has been canceled');
    }
    public function user_change_pw()
    {
        return view('user.change_pw');
    }
    public function post_user_change_pw(UserRequestChangePW $request,Customer $user)
    {  
       $user->edit_pw($request->id,$request); 
       return redirect()->back()->with('success','Your password has been changed!');
    }

//cart  
    public function cart(Cart $cart,Size $size,Product $product){
        $cart_items = $cart->items;
        $ship = Shipping::all();
        // dd($cart_items);
        return view('cart.cart',compact('cart_items','size','product','ship'));
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

//checkout
    public function checkout(Request $request,Cart $cart,Size $size){
        if($request->shipping){
            $cart_items = $cart->items;
            $shipping = Shipping::find($request->shipping);
            $payment = Payment::all();
            return view('checkout.checkout',compact('cart_items','size','shipping','payment'));
        }
    	else{
            return redirect()->route('cart')->with('error','Please select Shipping service before proceed to checkout!');
        }
    }

    public function post_checkout(OrderRequestCreate $request,Order $order)
    {
        $order->add($request);
        session()->forget('cart');
        return redirect()->route('user.order')->with('success','Thanks for your purchase!');
    }

//whishlist 
    public function whishlist(Size_detail $size_dt){
        $user = Auth::guard('customer')->user();
        $whishlists = Whishlist::where('customer_id',$user->id)->get();
    	return view('whishlist.whishlist',compact('whishlists','size_dt'));
    }
    public function whishlist_remove($id,$size_id){
        $user = Auth::guard('customer')->user();
        Whishlist::where('customer_id',$user->id)->where('product_id',$id)->where('size_id',$size_id)->delete();
    	return redirect()->back();
    }


    public function blog(){
    	return view('blog.blog-grid');
    }
    public function contact(){
    	return view('contact.contact');
    }
}
