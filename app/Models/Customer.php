<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;

class Customer extends Authenticatable
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

    public function order()
    {
        return $this->hasMany(Order::class,'customer_id','id');
    }
    public function whishlist()
    {
        return $this->hasMany(Whishlist::class,'customer_id','id');
    }

    public function login($request)
    {
        return Auth::guard('customer')->attempt($request->only('email','password'),$request->has('remember'));
    }

    public function add($request)
    {
        $hashed_pw = bcrypt($request->password);
        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => $hashed_pw,
            'avatar' => 'default-avatar.png'
        ]);
        Auth::guard('customer')->attempt($request->only('email','password'),$request->has('remember'));
    }

    public function edit($id,$request){
        Customer::where('id',$id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        if($request->has('avatar')){
            $img_name = time().($request->avatar->getClientOriginalName());
            $request->avatar->move(public_path('uploads/users'),$img_name);
            Customer::where('id',$id)->update([
                'avatar' => $img_name
            ]);
        }
    }

    public function edit_pw($id,$request){
        $hashed_pw = bcrypt($request->password);
        Customer::where('id',$id)->update([
            'password' => $hashed_pw
        ]);
    }
}
