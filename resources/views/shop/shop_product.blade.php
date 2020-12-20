@extends('shop.shop_master')
@section('shop-main')
<div class="ps-product-box">
	<div class="row">
		@if($pros->count()==0)
		<p class="mx-auto">No products were found matching your selection!</p>
		@endif
		@foreach($pros as $model)
		<?php 
			$size_id = $model->sizes->first()->id;
			$price = $size_dt->where('product_id',$model->id)->where('size_id',$size_id)->first()->price;
			$sale_price = $size_dt->where('product_id',$model->id)->where('size_id',$size_id)->first()->sale_price;  
			$sale_percent = round(($price-$sale_price)/$price*100);
		?>
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6">
			<div class="ps-product">
				<div class="ps-product__thumbnail">
					<img src="{{url("public/uploads/product")}}/{{$model->image}}" alt=""/>
					<a class="ps-product__overlay" href="{{route("shop.detail",[$model->id,Str::slug($model->name)])}}"></a>
					@if($sale_price)
					<span class="ps-badge ps-badge--sale"><i>{{$sale_percent}}%</i></span>
					@endif
				</div>
				<div class="ps-product__content">
					<div class="ps-product__desc"><a class="ps-product__title" href="{{route("shop.detail",[$model->id,Str::slug($model->name)])}}">{{$model->name}}</a>
						<p><span>{{$model->weight}}g</span></p><span class="ps-product__price sale">
							@if(is_null($sale_price))
								${{number_format($price,2)}}
							@else
								<del>${{number_format($price,2)}}</del> ${{number_format($sale_price,2)}}
							@endif
						</span>
					</div>
						<div class="ps-product__shopping"><a class="ps-btn ps-product__add-to-cart" href="{{route('cart.add',['id'=>$model->id,'size_id'=>$size_id])}}">Add to cart</a>
						<div class="ps-product__actions"><a href="#"><i class="fa fa-heart-o"></i></a><a href="#"><i class="fa fa-random"></i></a></div>
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
