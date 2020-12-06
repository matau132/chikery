<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $fillable = ['title','image','summary','link','status','priority'];

    public function add($request){
        $img_name = time().($request->image->getClientOriginalName());
        $request->image->move(public_path('uploads/banner'),$img_name);
        Banner::create([
            'title' => $request->title,
            'summary' => $request->summary,
            'link' => $request->link,
            'image' => $img_name
        ]);
    }

    public function edit($id,$request){
        if($request->has('image')){
            $img_name = time().($request->image->getClientOriginalName());
            $request->image->move(public_path('uploads/banner'),$img_name);
            Banner::where('id',$id)->update([
                'title' => $request->title,
                'summary' => $request->summary,
                'link' => $request->link,
                'image' => $img_name
            ]);
        }
        else{
            Banner::where('id',$id)->update([
                'title' => $request->title,
                'summary' => $request->summary,
                'link' => $request->link
            ]);
        }
    }

    public function remove($id){
        Banner::where('id',$id)->delete();
    }
}
