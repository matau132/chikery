<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name','link','summary','image','status','priority'];
    public function product(){
        return Category::hasMany(Product::class,'category_id','id');
    }

    public function add($request)
    {
        $img_name = time().($request->image->getClientOriginalName());
        $request->image->move(public_path('uploads/category'),$img_name);
        Category::create([
            'name' => $request->name,
            'link' => $request->link,
            'summary' => $request->summary,
            'image' => $img_name,
        ]);
        
    }

    public function edit($id,$request)
    {
        if($request->has('image')){
            $img_name = time().($request->image->getClientOriginalName());
            $request->image->move(public_path('uploads/category'),$img_name);
            Category::where('id',$id)->update([
                'name' => $request->name,
                'link' => $request->link,
                'summary' => $request->summary,
                'image' => $img_name
            ]);
        }
        else{
            Category::where('id',$id)->update([
                'name' => $request->name,
                'link' => $request->link,
                'summary' => $request->summary
            ]);
            return view('home');
        }
    }

    public function remove($id)
    {
        $cat = Category::find($id);
        if($cat->product->count() > 0){
            return false;
        }
        else{
            Category::where('id',$id)->delete();
            return true;
        }
    }
}
