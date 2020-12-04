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

    // public function update($request){

    // }

    // public function delete($request){

    // }
}
