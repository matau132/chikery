<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','summary','content','weight','image','image_list','status','priority','category_id'];
    public function category(){
        return Product::hasOne(Category::class,'id','category_id');
    }
    public function ingredients(){
        return Product::belongsToMany(Ingredient::class,'product_details','product_id','ingredient_id');
    }
    public function sizes(){
        return Product::belongsToMany(Size::class,'size_details','product_id','size_id');
    }
    public function size_detail()
    {
        return $this->hasMany(Size_detail::class,'product_id','id');
    }
    public function comment()
    {
        return $this->hasMany(Product_comment::class,'product_id','id');
    }

    public function add($request)
    {
        $img_name = time().($request->image->getClientOriginalName());
        $request->image->move(public_path('uploads/product'),$img_name);

        $img_list = $request->image_list;  //image list
        $img_list_name = [];
        foreach ($img_list as $img) {
            $list_name = time().($img->getClientOriginalName());
            $img->move(public_path('uploads/product'),$list_name);
            array_push($img_list_name,$list_name);
        };
        $db_list_name = json_encode($img_list_name);   

        Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'weight' => $request->weight,
            'summary' => $request->summary,
            'content' => $request->content,
            'image' => $img_name,
            'image_list' => $db_list_name
        ]);
           
        $thisProduct = Product::where('name',$request->name)->first();
        if($request->has('ingredient')){
            foreach($request->ingredient as $ingre){
                Product_detail::create([
                    'product_id' => $thisProduct->id,
                    'ingredient_id' => $ingre
                ]);
            }
        }
        if($request->has('sizes')){
            foreach($request->sizes as $size){
                Size_detail::create([
                    'product_id' => $thisProduct->id,
                    'size_id' => $size,
                    'price' => $request->size[$size]['price']
                ]);
            }
        }
    }

    public function edit($id,$request)
    {
        Product_detail::where('product_id',$id)->delete();
        if($request->has('ingredient')){
            foreach($request->ingredient as $ingre){
                Product_detail::create([
                    'product_id' => $id,
                    'ingredient_id' => $ingre
                ]);
            }
        }
        Size_detail::where('product_id',$id)->delete();
        if($request->has('sizes')){
            foreach($request->sizes as $size){
                Size_detail::create([
                    'product_id' => $id,
                    'size_id' => $size,
                    'price' => $request->size[$size]['price'],
                    'sale_price' => $request->size[$size]['sale_price'],
                    'quantity' => $request->size[$size]['quantity']
                ]);
            }
        }

        Product::where('id',$id)->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'weight' => $request->weight,
            'summary' => $request->summary,
            'content' => $request->content,
        ]);

        if($request->has('image')){         //image
            $img_name = time().($request->image->getClientOriginalName());
            $request->image->move(public_path('uploads/product'),$img_name);
            Product::where('id',$id)->update([
                'image' => $img_name
            ]);
        }
        
        if($request->has('image_list')){    //image list
            $img_list = $request->image_list;  
            $img_list_name = [];
            foreach ($img_list as $img) {
                $list_name = time().($img->getClientOriginalName());
                $img->move(public_path('uploads/product'),$list_name);
                array_push($img_list_name,$list_name);
            };
            $db_list_name = json_encode($img_list_name);  
            Product::where('id',$id)->update([
                'image_list' => $db_list_name
            ]); 
        }
    }

    public function remove($id)
    {
        Product_detail::where('product_id',$id)->delete();
        Size_detail::where('product_id',$id)->delete();
        Product::where('id',$id)->delete();
    }
}
