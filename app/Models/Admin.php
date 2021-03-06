<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'avatar',
    ];

    public function login($request)
    {
        return Auth::guard('admin')->attempt($request->only('email','password'),$request->has('remember'));
    }

    public function add($request)
    {
        $hashed_pw = bcrypt($request->password);
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => $hashed_pw,
        ]);
    }

    public function edit($id,$request){
        Admin::where('id',$id)->update($request->only('name','email','phone','address'));
    }

    public function edit_pw($id,$request){
        $hashed_pw = bcrypt($request->password);
        Admin::where('id',$id)->update([
            'password' => $hashed_pw
        ]);
    }

    public function remove($id){
        Admin::where('id',$id)->delete();
    }
}
