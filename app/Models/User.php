<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function add($request){
        $hashed_pw = bcrypt($request->password);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hashed_pw,
        ]);
    }

    public function edit($id,$request){
        User::where('id',$id)->update($request->only('name','email'));
    }

    public function edit_pw($id,$request){
        $hashed_pw = bcrypt($request->password);
        User::where('id',$id)->update([
            'password' => $hashed_pw
        ]);
    }

    public function remove($id){
        User::where('id',$id)->delete();
    }
}
