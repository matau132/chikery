<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Ingredient;
use App\Models\Product_detail;

class AdminController extends Controller
//index
{
    public function index(){
    	return view('admin.index');
    }

    public function upload(){
    	return redirect('public/filemanager/dialog.php');
    }

//product
    public function product(){
        $pros = Product::paginate(5);
        return view('admin.product.product',compact('pros'));
    }

    public function addProduct(){
        $cats = Category::orderBy('name','asc')->get();
    	return view('admin.product.add-product',compact('cats'));
    }
    public function post_addproduct(){
        $rule = [
          'name' => 'required|unique:products',
          'price' => 'required',
          'image' => 'required|mimes:png,jpg,jpeg',
          'image_list' => 'required',
          'category_id' => 'required'
        ];
        request()->validate($rule);
        
        $img_name = time().(request()->image->getClientOriginalName());
        request()->image->move(public_path('uploads/product'),$img_name);

        $img_list = request()->image_list;  //image list
        $img_list_name = [];
        foreach ($img_list as $img) {
            $list_name = time().($img->getClientOriginalName());
            $img->move(public_path('uploads/product'),$list_name);
            array_push($img_list_name,$list_name);
        };
        $db_list_name = json_encode($img_list_name);   

        Product::create([
            'name' => request()->name,
            'category_id' => request()->category_id,
            'weight' => request()->weight,
            'summary' => request()->summary,
            'content' => request()->content,
            'price' => request()->price,
            'image' => $img_name,
            'image_list' => $db_list_name
        ]);
        return redirect()->route('admin.Product')->with('success','Successfully add data!');
    }

    public function update_product($id){
        $cats = Category::all();
        $prod = Product::where('id',$id)->first();
        return view('admin.product.update',compact('cats','prod'));
    }
    public function post_update_product($id){
        $rule = [
            'name' => 'required|unique:products,name,'.$id,
            'price' => 'required',
            'image' => 'mimes:png,jpg,jpeg',
            'category_id' => 'required'
        ];
        request()->validate($rule);

        if(request()->has('image')){
            $img_name = time().(request()->image->getClientOriginalName());
            request()->image->move(public_path('uploads/product'),$img_name);
            Product::where('id',$id)->update([
                'name' => request()->name,
                'category_id' => request()->category_id,
                'weight' => request()->weight,
                'summary' => request()->summary,
                'content' => request()->content,
                'price' => request()->price,
                'image' => $img_name
            ]);
            return redirect()->route('admin.Product')->with('success','Updated data successfully!');
        }
        if(request()->has('image_list')){
            $img_list = request()->image_list;  //image list
            $img_list_name = [];
            foreach ($img_list as $img) {
                $list_name = time().($img->getClientOriginalName());
                $img->move(public_path('uploads/product'),$list_name);
                array_push($img_list_name,$list_name);
            };
            $db_list_name = json_encode($img_list_name);  
            Product::where('id',$id)->update([
                'name' => request()->name,
                'category_id' => request()->category_id,
                'weight' => request()->weight,
                'summary' => request()->summary,
                'content' => request()->content,
                'price' => request()->price,
                'image_list' => $db_list_name
            ]); 
            return redirect()->route('admin.Product')->with('success','Updated data successfully!');
        }
        if(request()->has('image')&&request()->has('image_list')){
            $img_name = time().(request()->image->getClientOriginalName());
            request()->image->move(public_path('uploads/product'),$img_name);
            $img_list = request()->image_list;  //image list
            $img_list_name = [];
            foreach ($img_list as $img) {
                $list_name = time().($img->getClientOriginalName());
                $img->move(public_path('uploads/product'),$list_name);
                array_push($img_list_name,$list_name);
            };
            $db_list_name = json_encode($img_list_name);  
            Product::where('id',$id)->update([
                'name' => request()->name,
                'category_id' => request()->category_id,
                'weight' => request()->weight,
                'summary' => request()->summary,
                'content' => request()->content,
                'price' => request()->price,
                'image' => $img_name,
                'image_list' => $db_list_name
            ]);
            return redirect()->route('admin.Product')->with('success','Updated data successfully!');
        }
        if(!request()->has('image')&&!request()->has('image_list')){
            Product::where('id',$id)->update([
                'name' => request()->name,
                'category_id' => request()->category_id,
                'weight' => request()->weight,
                'summary' => request()->summary,
                'content' => request()->content,
                'price' => request()->price
            ]);
            return redirect()->route('admin.Product')->with('success','Updated data successfully!');
        }
    }
    public function delete_product($id){
        Product::where('id',$id)->delete();
        return redirect()->route('admin.Product')->with('success','Deleted data successfully!');
    }

//category
    public function category(){
        $cats = Category::paginate(5);
        return view('admin.category.category',compact('cats'));
    }

    public function addcategory(){
    	return view('admin.category.add-category');
    }
    public function post_addcategory(){
        $rule = [
          'name' => 'required|unique:categories',
          'link' => 'required|unique:categories',
          'image' => 'required|mimes:png,jpg,jpeg'
        ];
        request()->validate($rule);
        $img_name = time().(request()->image->getClientOriginalName());
        request()->image->move(public_path('uploads/category'),$img_name);
        Category::create([
            'name' => request()->name,
            'link' => request()->link,
            'summary' => request()->summary,
            'image' => $img_name,
        ]);
    	return redirect()->route('admin.Category')->with('success','Successfully add data!');
    }
    public function update_category($id){
        $cat = Category::where('id',$id)->first();
        return view('admin.category.update',compact('cat'));
    }
    public function post_update_category($id){
        $rule = [
            'name' => 'required|unique:categories,name,'.$id,
            'link' => 'required|unique:categories,link,'.$id,
            'image' => 'mimes:png,jpg,jpeg'
        ];
        request()->validate($rule);
        if(request()->has('image')){
            $img_name = time().(request()->image->getClientOriginalName());
            request()->image->move(public_path('uploads/category'),$img_name);
            Category::where('id',$id)->update([
                'name' => request()->name,
                'link' => request()->link,
                'summary' => request()->summary,
                'image' => $img_name
            ]);
            return redirect()->route('admin.Category')->with('success','Updated data successfully!');
        }
        else{
            Category::where('id',$id)->update([
                'name' => request()->name,
                'link' => request()->link,
                'summary' => request()->summary
            ]);
            return redirect()->route('admin.Category')->with('success','Updated data successfully!');
        }
    }
    public function delete_category($id){
        $cat = Category::find($id);
        if($cat->product->count() > 0){
            return redirect()->route('admin.Category')->with('error','This category still have some products!');
        }
        else{
            Category::where('id',$id)->delete();
            return redirect()->route('admin.Category')->with('success','Deleted data successfully!');
        }
    }


//user
    public function user(){
        $users = User::paginate(5);
        return view('admin.user.user',compact('users'));
    }

//blog
    public function blog(){
        $blogs = Blog::paginate(5);
        return view('admin.blog.blog',compact('blogs'));
    }

    public function addblog(){
    	return view('admin.blog.add-blog');
    }
    public function post_addblog(){
         $rule = [
          'title' => 'required',
          'summary' => 'required',
          'content' => 'required',
          'admin_id' => 'required',
          'image' => 'mimes:png,jpg,jpeg'
        ];
        request()->validate($rule);
        $img_name = time().(request()->image->getClientOriginalName());
        request()->image->move(public_path('uploads/blog'),$img_name);
        Blog::create([
            'title' => request()->title,
            'summary' => request()->summary,
            'content' => request()->content,
            'admin_id' => request()->admin_id,
            'image' => $img_name
        ]);
    	return redirect()->route('admin.Blog')->with('success','Successfully add data!');
    }
    public function update_blog($id){
        $blog = Blog::where('id',$id)->first();
        return view('admin.blog.update',compact('blog'));
    }
    public function post_update_blog($id){
        $rule = [
            'title' => 'required',
            'summary' => 'required',
            'content' => 'required',
            'admin_id' => 'required',
            'image' => 'mimes:png,jpg,jpeg'
        ];
        request()->validate($rule);
        if(request()->has('image')){
            $img_name = time().(request()->image->getClientOriginalName());
            request()->image->move(public_path('uploads/blog'),$img_name);
            Blog::where('id',$id)->update([
                'title' => request()->title,
                'summary' => request()->summary,
                'content' => request()->content,
                'admin_id' => request()->admin_id,
                'image' => $img_name
            ]);
            return redirect()->route('admin.Blog')->with('success','Updated data successfully!');
        }
        else{
            Blog::where('id',$id)->update([
                'title' => request()->title,
                'summary' => request()->summary,
                'content' => request()->content,
                'admin_id' => request()->admin_id
            ]);
            return redirect()->route('admin.Blog')->with('success','Updated data successfully!');
        }
    }
    public function delete_blog($id){
        Blog::where('id',$id)->delete();
        return redirect()->route('admin.Blog')->with('success','Deleted data successfully!');
    }

//banner
    public function banner(){
        $bns = Banner::paginate(5);
        return view('admin.banner.banner',compact('bns'));
    }

    public function addbanner(){
        return view('admin.banner.add-banner');
    }
    public function post_addbanner(){
        $rule = [
          'title' => 'required',
          'image' => 'required|mimes:png,jpg,jpeg',
          'summary' => 'required',
          'link' => 'required|unique:banners'
        ];
        request()->validate($rule);
        $img_name = time().(request()->image->getClientOriginalName());
        request()->image->move(public_path('uploads/banner'),$img_name);
        Banner::create([
            'title' => request()->title,
            'summary' => request()->summary,
            'link' => request()->link,
            'image' => $img_name
        ]);
        return redirect()->route('admin.Banner')->with('success','Successfully add data!');
    }
    public function update_banner($id){
        $banner = Banner::where('id',$id)->first();
        return view('admin.banner.update',compact('banner'));
    }
    public function post_update_banner($id){
        $rule = [
            'title' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
            'summary' => 'required',
            'link' => 'required|unique:banners,link,'.$id
          ];
        request()->validate($rule);
        if(request()->has('image')){
            $img_name = time().(request()->image->getClientOriginalName());
            request()->image->move(public_path('uploads/banner'),$img_name);
            Banner::where('id',$id)->update([
                'title' => request()->title,
                'summary' => request()->summary,
                'link' => request()->link,
                'image' => $img_name
            ]);
            return redirect()->route('admin.Banner')->with('success','Updated data successfully!');
        }
        else{
            Banner::where('id',$id)->update([
                'title' => request()->title,
                'summary' => request()->summary,
                'link' => request()->link
            ]);
            return redirect()->route('admin.Banner')->with('success','Updated data successfully!');
        }
    }
    public function delete_banner($id){
        Banner::where('id',$id)->delete();
        return redirect()->route('admin.Banner')->with('success','Deleted data successfully!');
    }

// ingredient
    public function ingredient(){
        $ingre = Ingredient::paginate(5);
        return view('admin.ingredient.index',compact('ingre'));
    }

    public function addIngredient(){
        return view('admin.ingredient.add');
    }
    public function post_addIngredient(){
        $rule = [
          'name' => 'required|unique:ingredients',
          'price' => 'required'
        ];
        request()->validate($rule);
        Ingredient::create(request()->only('name','price'));
        return redirect()->route('admin.Ingredient')->with('success','Successfully add data!');
    }
    public function updateIngredient($id){
        $ingre = Ingredient::where('id',$id)->first();
        return view('admin.ingredient.update',compact('ingre'));
    }
    public function post_updateIngredient($id){
        $rule = [
          'name' => 'required|unique:ingredients,name,'.$id,
          'price' => 'required'
        ];
        request()->validate($rule);
        Ingredient::where('id',$id)->update(request()->only('name','price','status'));
        return redirect()->route('admin.Ingredient')->with('success','Updated data successfully!');
    }
    public function deleteIngredient($id){
        Ingredient::where('id',$id)->delete();
        return redirect()->route('admin.Ingredient')->with('success','Deleted data successfully!');
    }

//product detail
    public function Product_detail(){
        $pro_d = Product_detail::paginate(5);
        return view('admin.product_detail.index',compact('pro_d'));
    }
}
