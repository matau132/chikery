<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
//index
{
    public function index(){
    	return view('admin.index');
    }

//product
    public function product(){
        $pros = Product::all();
        return view('admin.product.product',compact('pros'));
    }

    public function addproduct(){
        $cats = Category::all();
    	return view('admin.product.add-product',compact('cats'));
    }
    public function post_addproduct(){
        $rule = [
          'name' => 'required|unique:products',
          'price' => 'required',
          'image' => 'required',
          'image_list' => 'required',
          'category_id' => 'required'
        ];
        request()->validate($rule);
        $img_name = request()->image->getClientOriginalName();
        request()->image->move(public_path('uploads/product'),time().$img_name);
        // $img_list = request()->image_list;
        // $img_list_name = '';
        // foreach ($img_list as $img) {
        //     $
        // };
        return redirect()->route('admin.product');
    }

//category
    public function category(){
        $cats = Category::all();
        return view('admin.category.category',compact('cats'));
    }

    public function addcategory(){
    	return view('admin.category.add-category');
    }
    public function post_addcategory(){
        $rule = [
          'name' => 'required|unique:categories',
          'link' => 'required',
          'image' => 'required'
        ];
        request()->validate($rule);
    	return redirect()->route('admin.category');
    }

//user
    public function user(){
        $users = User::all();
        return view('admin.user.user',compact('users'));
    }

//blog
    public function blog(){
        $blogs = Blog::all();
        return view('admin.blog.blog',compact('blogs'));
    }

    public function addblog(){
    	return view('admin.blog.add-blog');
    }
    public function post_addblog(){
         $rule = [
          'title' => 'required',
          'sumary' => 'required',
          'content' => 'required'
        ];
        request()->validate($rule);
    	return redirect()->route('admin.blog');
    }

//banner
    public function banner(){
        $bns = Banner::all();
        return view('admin.banner.banner',compact('bns'));
    }

    public function addbanner(){
        return view('admin.banner.add-banner');
    }
    public function post_addbanner(){
        $rule = [
          'title' => 'required',
          'image' => 'required',
          'sumary' => 'required',
          'link' => 'required'
        ];
        request()->validate($rule);

        return redirect()->route('admin.banner');
    }
}
