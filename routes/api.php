<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Shipping;
use App\Models\Size_detail;
use App\Models\Order;
use App\Models\Whishlist;
use App\Models\Customer;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/cart/change-shipping',function(Request $request){
    return(Shipping::find($request->shipping_id)->price);
});
Route::get('/product-detail/change-size',function(Request $request){
    $pro_dt = Size_detail::where('product_id',$request->pro_id)->where('size_id',$request->size_id)->first();
    if($request->customer_id!='null'){
        $check = Whishlist::where('customer_id',$request->customer_id)->where('product_id',$request->pro_id)->where('size_id',$request->size_id)->first();
        if($check){
            $flag = 1;
        }
        else{
            $flag = 0;
        }
    }
    return ['pro_dt'=> $pro_dt,'flag' => $flag];
});
Route::post('/order-status',function(Request $request){
    $check = Order::where('id',$request->order_id)->update([
        'status' => $request->status
    ]);
    return $check;
}); 
Route::post('/add/whishlist',function(Request $request){
    $flag = Whishlist::where('customer_id',$request->customer_id)->where('product_id',$request->product_id)->where('size_id',$request->size_id)->first();
    if(!$flag){
        $check = Whishlist::create($request->only('customer_id','product_id','size_id'));
    }
    return $request->all();
}); 
Route::post('/remove/whishlist',function(Request $request){
    $check = Whishlist::where('customer_id',$request->customer_id)->where('product_id',$request->product_id)->where('size_id',$request->size_id)->delete();
    return $check;
}); 