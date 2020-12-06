<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['title','summary','content','image','admin_id','status'];

    public function add($request)
    {
        $img_name = time().(request()->image->getClientOriginalName());
        request()->image->move(public_path('uploads/blog'),$img_name);
        Blog::create([
            'title' => request()->title,
            'summary' => request()->summary,
            'content' => request()->content,
            'admin_id' => request()->admin_id,
            'image' => $img_name
        ]);
    }

    public function edit($id,$request)
    {
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
        }
        else{
            Blog::where('id',$id)->update([
                'title' => request()->title,
                'summary' => request()->summary,
                'content' => request()->content,
                'admin_id' => request()->admin_id
            ]);
        }
    }
    
    public function remove($id)
    {
        Blog::where('id',$id)->delete();
    }
}
