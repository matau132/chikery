@extends('shop.shop_master')
@section('shop-main')
<div class="ps-product-box">
	<div class="row">
		@if($pros->count()==0)
		<p class="mx-auto">No products were found matching your selection!</p>
		@endif
		@foreach($pros as $model)
		<?php 
			$price = $model->price;
			$sale_price = $model->sale_price;  
			$sale_percent = round(($price-$sale_price)/$price*100);
		?>
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6">
			<div class="ps-product">
				<div class="ps-product__thumbnail">
					<img src="{{url("public/uploads/product")}}/{{$model->product->image}}" alt=""/>
					<a class="ps-product__overlay" href="{{route("shop.detail",[$model->product->id,Str::slug($model->product->name)])}}"></a>
					@if($sale_price)
					<span class="ps-badge ps-badge--sale"><i>{{$sale_percent}}%</i></span>
					@endif
				</div>
				<div class="ps-product__content">
					<div class="ps-product__desc"><a class="ps-product__title" href="{{route("shop.detail",[$model->product->id,Str::slug($model->product->name)])}}">{{$model->product->name}}</a>
						<p><span>{{$model->product->weight}}g</span></p><span class="ps-product__price sale">
							@if(is_null($sale_price))
								${{number_format($price,2)}}
							@else
								<del>${{number_format($price,2)}}</del> ${{number_format($sale_price,2)}}
							@endif
						</span>
					</div>
						<div class="ps-product__shopping"><a class="ps-btn ps-product__add-to-cart" href="{{route('cart.add',['id'=>$model->product->id,'size_id'=>$model->size_id])}}">Add to cart</a>
						<?php 
							if(Auth::guard('customer')->check()){
								$whishlishs = [];
								foreach(Auth::guard('customer')->user()->whishlist as $whish){
									$whishlishs[] = $whish->product_id;
								}
							}	
						?>
						<div class="ps-product__actions">
							@if(Auth::guard('customer')->check())
							<a href="" class="whishlist_btn {{in_array($model->product->id,$whishlishs)?'active':''}}"><i class="fa fa-heart-o"></i></a>
							@endif
							<input type="hidden" value="{{$model->product->id}}">
							<input type="hidden" value="{{$model->size_id}}">
							<a href="#"><i class="fa fa-random"></i></a></div>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
{{$pros->appends(request()->input())->links('vendor/pagination/shop-paginate')}}

<!-- <div class="ps-pagination">
	<ul class="pagination">
		<li><a href="#"><i class="fa fa-caret-left"></i></a></li>
		<li class="active"><a href="#">1</a></li>
		<li><a href="#">2</a></li>
		<li><a href="#">3</a></li>
		<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
	</ul>
</div> -->
@stop

@section('js')
<script>
	$(document).ready(function () {
		$('.whishlist_btn').click(function(){
			$('.load-animation').css('display','flex');
			if($(this).hasClass('active')){
				$.ajax({
					url: '{{url("api/remove/whishlist")}}',
					type: "POST",
					data: {customer_id: {{Auth::guard('customer')->check()?Auth::guard('customer')->user()->id:'null'}},product_id: $(this).next().val(),size_id: $(this).next().next().val()},
					success: function(res){
						$('.load-animation').css('display','none');
					}
				});
				$(this).removeClass('active');
			}
			else{
				$.ajax({
					url: '{{url("api/add/whishlist")}}',
					type: "POST",
					data: {customer_id: {{Auth::guard('customer')->check()?Auth::guard('customer')->user()->id:'null'}},product_id: $(this).next().val(),size_id: $(this).next().next().val()},
					success: function(res){
						$('.load-animation').css('display','none');
					}
				});
				$(this).addClass('active');
			}
			return false;
		});
	});
</script>
@stop