<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Ingredient;
use App\Models\Size;
use App\Models\Product_detail;
use App\Models\Size_detail;
use App\Models\Admin;
use App\Models\Shipping;
use App\Models\Payment;
use App\Models\Order;
use App\Models\Order_detail;
use App\Http\Requests\User\UserRequestAdd;
use App\Http\Requests\User\UserRequestUpdate;
use App\Http\Requests\User\UserRequestChangePW;
use App\Http\Requests\Banner\BannerRequestAdd;
use App\Http\Requests\Banner\BannerRequestUpdate;
use App\Http\Requests\Blog\BlogRequestAdd;
use App\Http\Requests\Blog\BlogRequestUpdate;
use App\Http\Requests\Category\CategoryRequestAdd;
use App\Http\Requests\Category\CategoryRequestUpdate;
use App\Http\Requests\Ingredient\IngredientRequestAdd;
use App\Http\Requests\Ingredient\IngredientRequestUpdate;
use App\Http\Requests\Size\SizeRequestAdd;
use App\Http\Requests\Size\SizeRequestUpdate;
use App\Http\Requests\Product\ProductRequestAdd;
use App\Http\Requests\Product\ProductRequestUpdate;
use App\Http\Requests\Admin\AdminRequestAdd;
use App\Http\Requests\Admin\AdminRequestUpdate;
use App\Http\Requests\Admin\AdminRequestChangePW;
use App\Http\Requests\Admin\AdminRequestLogin;
use App\Http\Requests\Shipping\ShippingRequestAdd;
use App\Http\Requests\Shipping\ShippingRequestUpdate;
use App\Http\Requests\Payment\PaymentRequestAdd;
use App\Http\Requests\Payment\PaymentRequestUpdate;

class AdminController extends Controller
//index
{
    public function index(){
    	return view('admin.index');
    }


//login
    public function login()
    {
        return view('admin.login');
    }
    public function post_login(AdminRequestLogin $request,Admin $admin)
    {
        if($admin->login($request)){
            return redirect()->route('admin.index');
        }
        else{
            return redirect()->back()->with('error','Incorect Email or Password!');
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

//product
    public function product(Request $request){
        if($request->has('key_word')){
            $pros = Product::where('id','like','%'.$request->key_word.'%')->orWhere('name','like','%'.$request->key_word.'%')->orderBy('name','asc')->paginate(5);
        }
        else{
            $pros = Product::orderBy('name','asc')->paginate(5);
        }
        return view('admin.product.product',compact('pros'));
    }

    public function addProduct(){
        $cats = Category::orderBy('name','asc')->get();
        $ingres = Ingredient::orderBy('name','asc')->get();
        $sizes = Size::orderBy('name','asc')->get();
    	return view('admin.product.add-product',compact('cats','ingres','sizes'));
    }
    public function post_addproduct(Product $pro,ProductRequestAdd $request){
        $pro->add($request);
        return redirect()->route('admin.Product')->with('success','Successfully add data!');
    }
    public function update_product($id,Size_detail $size_dt){
        $cats = Category::orderBy('name','asc')->get();
        $prod = Product::find($id);
        $ingres = Ingredient::orderBy('name','asc')->get();
        $prod_ingres = [];
        foreach($prod->ingredients as $prod_ingre){
            $prod_ingres[] = $prod_ingre->id;
        }
        $sizes = Size::orderBy('name','asc')->get();
        $prod_sizes = [];
        foreach($prod->sizes as $prod_size){
            $prod_sizes[] = $prod_size->id;
        }
        return view('admin.product.update',compact('cats','prod','ingres','prod_ingres','sizes','prod_sizes','size_dt'));
    }
    public function post_update_product($id,Product $pro,ProductRequestUpdate $request){
        $pro->edit($id,$request);
        return redirect()->route('admin.Product')->with('success','Updated data successfully!');
    }
    public function delete_product($id,Product $pro){
        $pro->remove($id);
        if($pro->remove($id)){
            return redirect()->route('admin.Product')->with('success','Deleted data successfully!');
        }
        else{
            return redirect()->route('admin.Product')->with('error','There are some orders or whishlists belong to this product!');
        }
    }

//category
    public function category(Request $request){
        if($request->has('key_word')){
            $cats = Category::where('id','like','%'.$request->key_word.'%')->orWhere('name','like','%'.$request->key_word.'%')->orderBy('name','asc')->paginate(5);
        }
        else{
            $cats = Category::orderBy('name','asc')->paginate(5);
        }
        return view('admin.category.category',compact('cats'));
    }
    public function addcategory(){
    	return view('admin.category.add-category');
    }
    public function post_addcategory(Category $cat,CategoryRequestAdd $request){
        $cat->add($request);
    	return redirect()->route('admin.Category')->with('success','Successfully add data!');
    }
    public function update_category($id){
        $cat = Category::where('id',$id)->first();
        return view('admin.category.update',compact('cat'));
    }
    public function post_update_category($id,Category $cat,CategoryRequestUpdate $request){
        $cat->edit($id,$request);
        return redirect()->route('admin.Category')->with('success','Updated data successfully!');
    }
    public function delete_category($id,Category $cat){
        if($cat->remove($id)){
            return redirect()->route('admin.Category')->with('success','Deleted data successfully!');
        }
        else{
            return redirect()->route('admin.Category')->with('error','This category still have some products!');
        }
    }

//blog
    public function blog(Request $request){
        if($request->has('key_word')){
            $blogs = Blog::where('id','like','%'.$request->key_word.'%')->orWhere('title','like','%'.$request->key_word.'%')->orderBy('title','asc')->paginate(5);
        }
        else{
            $blogs = Blog::orderBy('title','asc')->paginate(5);
        }
        return view('admin.blog.blog',compact('blogs'));
    }
    public function addblog(){
    	return view('admin.blog.add-blog');
    }
    public function post_addblog(BlogRequestAdd $request,Blog $blog){
        $blog->add($request);
    	return redirect()->route('admin.Blog')->with('success','Successfully add data!');
    }
    public function update_blog($id){
        $blog = Blog::where('id',$id)->first();
        return view('admin.blog.update',compact('blog'));
    }
    public function post_update_blog($id,Blog $blog,BlogRequestUpdate $request){
       $blog->edit($id,$request);
       return redirect()->route('admin.Blog')->with('success','Updated data successfully!');
    }
    public function delete_blog($id,Blog $blog){
        $blog->remove($id);
        return redirect()->route('admin.Blog')->with('success','Deleted data successfully!');
    }

//banner
    public function banner(Request $request){
        if($request->has('key_word')){
            $bns = Banner::where('id','like','%'.$request->key_word.'%')->orWhere('title','like','%'.$request->key_word.'%')->orderBy('title','asc')->paginate(5);
        }
        else{
            $bns = Banner::orderBy('title','asc')->paginate(5);
        }
        return view('admin.banner.banner',compact('bns'));
    }

    public function addbanner(){
        return view('admin.banner.add-banner');
    }
    public function post_addbanner(Banner $banner,BannerRequestAdd $request){
        $banner->add($request);
        return redirect()->route('admin.Banner')->with('success','Successfully add data!');
    }
    public function update_banner($id){
        $banner = Banner::where('id',$id)->first();
        return view('admin.banner.update',compact('banner'));
    }
    public function post_update_banner($id,Banner $banner,BannerRequestUpdate $request){
        $banner->edit($id,$request);
        return redirect()->route('admin.Banner')->with('success','Updated data successfully!');
    }
    public function delete_banner($id,Banner $banner){
        $banner->remove($id);
        return redirect()->route('admin.Banner')->with('success','Deleted data successfully!');
    }

// ingredient
    public function ingredient(Request $request){
        if($request->has('key_word')){
            $ingre = Ingredient::where('id','like','%'.$request->key_word.'%')->orWhere('name','like','%'.$request->key_word.'%')->orderBy('name','asc')->paginate(8);
        }
        else{
            $ingre = Ingredient::orderBy('name','asc')->paginate(8);
        }
        return view('admin.ingredient.index',compact('ingre'));
    }
    public function addIngredient(){
        return view('admin.ingredient.add');
    }
    public function post_addIngredient(Ingredient $ingre,IngredientRequestAdd $request){
        $ingre->add($request);
        return redirect()->route('admin.Ingredient')->with('success','Successfully add data!');
    }
    public function updateIngredient($id){
        $ingre = Ingredient::where('id',$id)->first();
        return view('admin.ingredient.update',compact('ingre'));
    }
    public function post_updateIngredient($id,Ingredient $ingre,IngredientRequestUpdate $request){
        $ingre->edit($id,$request);
        return redirect()->route('admin.Ingredient')->with('success','Updated data successfully!');
    }
    public function deleteIngredient($id,Ingredient $ingre){
        $ingre->remove($id);
        return redirect()->route('admin.Ingredient')->with('success','Deleted data successfully!');
    }

//product detail
    public function product_detail(Request $request){
        if($request->has('key_word')){
            $pro_d = Product_detail::join('products','products.id','=','product_details.product_id')->join('ingredients','ingredients.id','=','product_details.ingredient_id')->select('product_details.*')->where('products.id','like','%'.$request->key_word.'%')->orWhere('products.name','like','%'.$request->key_word.'%')->orWhere('ingredients.id','like','%'.$request->key_word.'%')->orWhere('ingredients.name','like','%'.$request->key_word.'%')->orderBy('product_id','asc')->paginate(8);
        }
        else{
            $pro_d = Product_detail::orderBy('product_id','asc')->paginate(8);
        }
        return view('admin.product_detail.index',compact('pro_d'));
    }

//size
    public function size(Request $request){
        if($request->has('key_word')){
            $sizes = Size::where('id','like','%'.$request->key_word.'%')->orWhere('name','like','%'.$request->key_word.'%')->orderBy('name','asc')->paginate(5);
        }
        else{
            $sizes = Size::orderBy('name','asc')->paginate(5);
        }
        return view('admin.size.index',compact('sizes'));
    }
    public function addSize(){
        return view('admin.size.add');
    }
    public function post_addSize(Size $size,SizeRequestAdd $request){
        $size->add($request);
        return redirect()->route('admin.Size')->with('success','Successfully add data!');
    }
    public function updateSize($id){
        $size = Size::find($id);
        return view('admin.size.update',compact('size'));
    }
    public function post_updateSize($id,Size $size,SizeRequestUpdate $request){
        $size->edit($id,$request);
        return redirect()->route('admin.Size')->with('success','Updated data successfully!');
    }
    public function deleteSize($id,Size $size){
        $size->remove($id);
        if($size->remove($id)){
            return redirect()->route('admin.Size')->with('success','Deleted data successfully!');
        }
        else{
            return redirect()->route('admin.Size')->with('error','There are some whishlists belong to this size!');
        }
    }

//size detail
public function size_detail(Request $request){
    if($request->has('key_word')){
        $size_d = Size_detail::join('products','products.id','=','size_details.product_id')->join('sizes','sizes.id','=','size_details.size_id')->select('size_details.*')->where('products.id','like','%'.$request->key_word.'%')->orWhere('products.name','like','%'.$request->key_word.'%')->orWhere('sizes.id','like','%'.$request->key_word.'%')->orWhere('sizes.name','like','%'.$request->key_word.'%')->orderBy('product_id','asc')->paginate(8);
    }
    else{
        $size_d = Size_detail::orderBy('product_id','asc')->paginate(8);
    }
    return view('admin.size_detail.index',compact('size_d'));
}

//customer
    public function customer(Request $request){
        if($request->has('key_word')){
            $customers = Customer::where('id','like','%'.$request->key_word.'%')->orWhere('name','like','%'.$request->key_word.'%')->orWhere('email','like','%'.$request->key_word.'%')->orWhere('phone','like','%'.$request->key_word.'%')->orderBy('name','asc')->paginate(8);
        }
        else{
            $customers = Customer::orderBy('name','asc')->paginate(8);
        }
        return view('admin.customer.index',compact('customers'));
    }
    
//admin
    public function admin(Request $request){
        if($request->has('key_word')){
            $admins = Admin::where('id','like','%'.$request->key_word.'%')->orWhere('name','like','%'.$request->key_word.'%')->orWhere('email','like','%'.$request->key_word.'%')->orWhere('phone','like','%'.$request->key_word.'%')->orderBy('name','asc')->paginate(8);
        }
        else{
            $admins = Admin::orderBy('name','asc')->paginate(8);
        }
        return view('admin.ad.index',compact('admins'));
    }
    public function addadmin(){
        return view('admin.ad.add');
    }
    public function post_addadmin(Admin $admin,AdminRequestAdd $request){
        $admin->add($request);
        return redirect()->route('admin.Admin')->with('success','Successfully add data!');
    }
    public function update_admin($id){
        $admin = Admin::where('id',$id)->first();
        return view('admin.ad.update',compact('admin'));
    }
    public function post_update_admin($id,Admin $admin,AdminRequestUpdate $request){
        $admin->edit($id,$request);
        return redirect()->route('admin.Admin')->with('success','Updated data successfully!');
    }
    public function change_admin_pw($id){
        return view('admin.ad.change_pw');
    }
    public function post_change_admin_pw($id,Admin $admin,AdminRequestChangePW $request){
        $admin->edit_pw($id,$request);
        return redirect()->route('admin.Admin')->with('success','Changed password successfully!');
    }
    public function delete_admin($id,Admin $admin){
        $admin->remove($id);
        return redirect()->route('admin.Admin')->with('success','Deleted data successfully!');
    }

//shipping
    public function shipping(Request $request){
        if($request->has('key_word')){
            $ship = Shipping::where('id','like','%'.$request->key_word.'%')->orWhere('name','like','%'.$request->key_word.'%')->orderBy('name','asc')->paginate(8);
        }
        else{
            $ship = Shipping::orderBy('name','asc')->paginate(8);
        }
        return view('admin.shipping.index',compact('ship'));
    }
    public function addShipping(){
        return view('admin.shipping.add');
    }
    public function post_addShipping(Shipping $ship,ShippingRequestAdd $request){
        $ship->add($request);
        return redirect()->route('admin.Shipping')->with('success','Successfully add data!');
    }
    public function updateShipping($id){
        $ship = Shipping::where('id',$id)->first();
        return view('admin.shipping.update',compact('ship'));
    }
    public function post_updateShipping($id,Shipping $ship,ShippingRequestUpdate $request){
        $ship->edit($id,$request);
        return redirect()->route('admin.Shipping')->with('success','Updated data successfully!');
    }
    public function deleteShipping($id,Shipping $ship){
        if($ship->remove($id)){
            return redirect()->route('admin.Shipping')->with('success','Deleted data successfully!');
        }
        else{
            return redirect()->route('admin.Shipping')->with('error','There are still some orders related to this shipping service!');
        }
    }

//payment
    public function payment(Request $request){
        if($request->has('key_word')){
            $payment = Payment::where('id','like','%'.$request->key_word.'%')->orWhere('name','like','%'.$request->key_word.'%')->orderBy('name','asc')->paginate(8);
        }
        else{
            $payment = Payment::orderBy('name','asc')->paginate(8);
        }
        return view('admin.payment.index',compact('payment'));
    }
    public function addPayment(){
        return view('admin.payment.add');
    }
    public function post_addPayment(Payment $payment,PaymentRequestAdd $request){
        $payment->add($request);
        return redirect()->route('admin.Payment')->with('success','Successfully add data!');
    }
    public function updatePayment($id){
        $payment = Payment::where('id',$id)->first();
        return view('admin.payment.update',compact('payment'));
    }
    public function post_updatePayment($id,Payment $payment,PaymentRequestUpdate $request){
        $payment->edit($id,$request);
        return redirect()->route('admin.Payment')->with('success','Updated data successfully!');
    }
    public function deletePayment($id,Payment $payment){
        if($payment->remove($id)){
            return redirect()->route('admin.Payment')->with('success','Deleted data successfully!');
        }
        else{
            return redirect()->route('admin.Payment')->with('error','There are still some orders related to this payment service!');
        }
    }

//order
    public function order(Order_detail $order_dt,Request $request)
    {
        if($request->has('key_word')){
            $orders = Order::join('customers','customers.id','=','orders.customer_id')->select('orders.*')->where('orders.id','like','%'.$request->key_word.'%')->orWhere('customer_id','like','%'.$request->key_word.'%')->orWhere('customers.email','like','%'.$request->key_word.'%')->orderBy('orders.created_at','desc')->paginate(8);
        }
        else{
            $orders = Order::orderBy('created_at','desc')->paginate(8);
        }
        return view('admin.order.index',compact('orders','order_dt'));
    }
    public function order_detail($id,Size_detail $size_dt)
    {
        $order_dt = Order_detail::where('order_id',$id)->get();
        $order = Order::find($id);
        return view('admin.order.order_detail',compact('order_dt','order','size_dt'));
    }
}
