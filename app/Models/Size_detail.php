<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size_detail extends Model
{
    use HasFactory;
    protected $table = 'size_details';
    protected $fillable = ['product_id','size_id'];
}
