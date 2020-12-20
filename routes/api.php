<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Shipping;
use App\Models\Size_detail;
use App\Models\Order;

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
Route::get('/product',function(){
    return Product::paginate(2);
});
Route::get('/cart/change-shipping',function(Request $request){
    return(Shipping::find($request->shipping_id)->price);
});
Route::get('/product-detail/change-size',function(Request $request){
    $pro_dt = Size_detail::where('product_id',$request->pro_id)->where('size_id',$request->size_id)->first();
    return($pro_dt);
});
Route::post('/order-status',function(Request $request){
    $check = Order::where('id',$request->order_id)->update([
        'status' => $request->status
    ]);
    return $check;
}); 
