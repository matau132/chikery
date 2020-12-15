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

class AdminController extends Controller
//index
{
    public function index(){
    	return view('admin.index');
    }

    public function upload(){
    	return redirect('public/filemanager/dialog.php');
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
    public function product(){
        $pros = Product::orderBy('name','asc')->paginate(5);
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
        return redirect()->route('admin.Product')->with('success','Deleted data successfully!');
    }

//category
    public function category(){
        $cats = Category::orderBy('name','asc')->paginate(5);
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
    public function blog(){
        $blogs = Blog::orderBy('title','asc')->paginate(5);
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
    public function banner(){
        $bns = Banner::orderBy('title','asc')->paginate(5);
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
    public function ingredient(){
        $ingre = Ingredient::orderBy('name','asc')->paginate(8);
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
    public function product_detail(){
        $pro_d = Product_detail::orderBy('product_id','asc')->paginate(8);
        return view('admin.product_detail.index',compact('pro_d'));
    }

//size
    public function size(){
        $sizes = Size::orderBy('name','asc')->paginate(5);
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
        return redirect()->route('admin.Size')->with('success','Deleted data successfully!');
    }

//size detail
public function size_detail(){
    $size_d = Size_detail::orderBy('product_id','asc')->paginate(8);
    return view('admin.size_detail.index',compact('size_d'));
}

//customer
    public function customer(){
        $customers = Customer::orderBy('name','asc')->paginate(8);
        return view('admin.customer.index',compact('customers'));
    }
    
//admin
    public function admin(){
        $admins = Admin::orderBy('name','asc')->paginate(8);
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
}
