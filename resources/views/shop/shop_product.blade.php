@extends('shop.shop_master')
@section('shop-main')
<div class="ps-product-box">
	<div class="row">
		@foreach($pros as $model)
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 ">
			<div class="ps-product">
				<div class="ps-product__thumbnail"><img src="{{url('public/uploads/product')}}/{{$model->image}}" alt=""/><a class="ps-product__overlay" href="product-default.html"></a>
				</div>
				<div class="ps-product__content">
					<div class="ps-product__desc"><a class="ps-product__title" href="product-default.html">{{$model->name}}</a>
						<p><span>{{$model->weight}}g</span></p><span class="ps-product__price">${{$model->price}}</span>
					</div>
					<div class="ps-product__shopping"><a class="ps-btn ps-product__add-to-cart" href="#">Add to cart</a>
						<div class="ps-product__actions"><a href="#"><i class="fa fa-heart-o"></i></a><a href="#"><i class="fa fa-random"></i></a></div>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
<div class="ps-pagination">
	<ul class="pagination">
		<li><a href="#"><i class="fa fa-caret-left"></i></a></li>
		<li class="active"><a href="#">1</a></li>
		<li><a href="#">2</a></li>
		<li><a href="#">3</a></li>
		<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
	</ul>
</div>
@stop