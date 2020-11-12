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
        $pros = products::all();
        return view('admin.product.product',compact('pros'));
    }

    public function addproduct(){
    	return view('admin.product.add-product');
    }
    public function post_addproduct(){
        $rule = [
          'name' => 'required|unique:products',
          'price' => 'required',
          'image' => 'required',
          'image_list' => 'required'
        ];
        request()->validate($rule);
        return redirect()->route('admin.product');
    }

//category
    public function category(){
        $cats = categories::all();
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
        $users = users::all();
        return view('admin.user.user',compact('users'));
    }

//blog
    public function blog(){
        $blogs = blogs::all();
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
        $bns = banners::all();
        return view('admin.banner.banner',compact('bns'));
    }

    public function addbanner(){
        return view('admin.banner.add-banner');
    }
    public function post_addbanner(){
        $rule = [
          'title' => 'required',
          'sumary' => 'required',
          'link' => 'required'
        ];
        request()->validate($rule);

        return redirect()->route('admin.banner');
    }
}
