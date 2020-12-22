@extends('master')
@section('title','Product Detail')
@section('class','product-detail')
@section('main')
<?php 
  $size_id = $pro->sizes->first()->id;
  $price = $size_dt->where('product_id',$pro->id)->where('size_id',$size_id)->first()->price;
  $sale_price = $size_dt->where('product_id',$pro->id)->where('size_id',$size_id)->first()->sale_price;
  if(Auth::guard('customer')->check()){
    $user = Auth::guard('customer')->user();
  }
?>
<div class="container">
  <div class="ps-product--detail">
    <div class="ps-product__header">
      <div class="ps-product__thumbnail" data-vertical="false">
        <figure>
          <div class="ps-wrapper">
            @if($sale_price)
            <?php $sale_percent = round(($price-$sale_price)/$price*100); ?>
            <span class="ps-badge ps-badge--sale"><i>{{$sale_percent}}%</i></span>
            @endif
            <div class="ps-product__gallery" data-arrow="true">
                <div class="item"><a href="{{url('public/uploads/product')}}/{{$pro->image}}"><img src="{{url('public/uploads/product')}}/{{$pro->image}}" alt=""></a></div>
                @foreach(json_decode($pro->image_list) as $img1)
                  <div class="item"><a href="{{url('public/uploads/product')}}/{{$img1}}"><img src="{{url('public/uploads/product')}}/{{$img1}}" alt=""></a></div>
                @endforeach
            </div>
          </div>
        </figure>
        <div class="ps-product__variants" data-item="5" data-md="4" data-sm="4" data-arrow="false">
          <div class="item"><img src="{{url('public/uploads/product')}}/{{$pro->image}}" alt=""></div>
          @foreach(json_decode($pro->image_list) as $img2)
          <div class="item"><img src="{{url('public/uploads/product')}}/{{$img2}}" alt=""></div>
          @endforeach
        </div>
      </div>
      <style>@media screen and (max-width: 767px) {.product_form{padding-left: 0 !important;}}</style>
      <form action="{{route('shop.order')}}" method="post" style="padding-left: 30px" class="product_form">
        @csrf
        <input type="hidden" name="product" value="{{$pro->id}}">
      <div class="ps-product__info p-0" style="max-width: 100%">
        <h1>{{$pro->name}}</h1>
        <div class="ps-product__meta">
          <div class="ps-product__rating">
            <select class="ps-rating" data-read-only="true">
              <option value="1">1</option>
              <option value="1">2</option>
              <option value="1">3</option>
              <option value="1">4</option>
              <option value="2">5</option>
            </select>
          </div>
        </div>
        <h4 class="ps-product__price sale pro_price">
          @if(!is_null($sale_price))
            <del>${{number_format($price,2)}}</del> ${{number_format($sale_price,2)}}
          @else
          ${{number_format($price,2)}}
          @endif
        </h4>
        <div class="ps-product__desc">
          <p>{!!Str::limit($pro->summary,500)!!}</p>
        </div>
        <div class="ps-product__specification">
          <p><strong>AVAILABILITY:</strong>{{$pro->status==1?'InStock':'Out of stock'}}</p>
          <p><strong> CATEGORIES:</strong><a href="{{route('shop.ingredient',[$pro->category->id, Str::slug($pro->category->name)])}}">{{$pro->category->name}}</a></p>
        </div>
        <div class="ps-product__shopping flex-wrap">
          <select class="ps-select size_box" title="Choose Size" name="size">
            @foreach($pro->sizes as $model)
            <option value="{{$model->id}}">{{$model->name}}</option>
            @endforeach
          </select>
          <div class="form-group--number">
            <button type="button" class="up"></button>
            <button type="button" class="down"></button>
            <input class="form-control pro_quantity" type="text" value="1" name="quantity">
          </div><button class="ps-btn mt-3 mt-xl-0 order_btn">Order now</button>
          <div class="ps-product__actions">
            <a href="#"><i class="icon-heart"></i></a>
            <a href="#"><i class="icon-chart-bars"></i></a>
          </div>
        </div>
        @error('quantity')
          <small id="emailHelp" class="form-text text-danger mb-4" style="font-size:1.5rem;margin-top: -20px">{{$message}}.</small>
        @enderror
        <div class="ps-product__sharing d-flex">
          <div class="ps-product__actions d-flex">
            @if(Auth::guard('customer')->check())
            <?php $flag = $whishlist->where('customer_id',$user->id)->where('product_id',$pro->id)->where('size_id',$pro->sizes->first()->id)->first(); ?>
            <a href="" class="dt_whishlist {{$flag?'active':''}}"><i class="fa fa-heart-o"></i></a>
            @endif
            <input type="hidden" value="{{$pro->id}}">
            <a href="#"><i class="fa fa-random"></i></a>
          </div>
          <p>Share This:<a class="facebook" href="#"><i class="fa fa-facebook"></i></a><a class="twitter" href="#"><i class="fa fa-twitter"></i></a><a class="google" href="#"><i class="fa fa-google-plus"></i></a><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></p>
        </div>
      </div>
      </form>
    </div>
    <div class="ps-product__content ps-tab-root">
      <ul class="ps-tab-list">
        <li class="active"><a href="#tab-1">Description</a></li>
        <li><a href="#tab-2">Reviews</a></li>
        <li><a href="#tab-3">Addtional info</a></li>
      </ul>
      <div class="ps-tabs">
        <div class="ps-tab active" id="tab-1">
          <div class="ps-document">
            <p>{!!$pro->summary!!}</p>
          </div>
        </div>
        <div class="ps-tab" id="tab-2">
          <div class="ps-reviews">
            <div class="ps-block--review">
              <div class="ps-block__thumbnail"><img src="{{url('public/uploads')}}/users/review/1.jpg" alt=""></div>
              <div class="ps-block__content">
                <figure>
                  <figcaption>By <strong> Jont herry</strong> <span> 22/04/2019</span></figcaption>
                  <select class="ps-rating" data-read-only="true">
                    <option value="1">1</option>
                    <option value="1">2</option>
                    <option value="1">3</option>
                    <option value="1">4</option>
                    <option value="2">5</option>
                  </select>
                </figure>
                <p>Nam ac elit a ante commodo tristique. Duis lacus urna, condimentum a vehicula a, hendrerit ac nisi Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vulputate, tortor nec commodo ultricies, vitae viverra urna nulla sed turpis. Curabitur sed turpis feugiat, mollis felis vel, viverra metus. Sed vel nulla non neque dictum imperdiet. Aliquam egestas hendrerit euismod.</p>
              </div>
            </div>
            <div class="ps-block--review">
              <div class="ps-block__thumbnail"><img src="{{url('public/uploads')}}/users/review/2.jpg" alt=""></div>
              <div class="ps-block__content">
                <figure>
                  <figcaption>By <strong> Jont herry</strong> <span> 22/04/2019</span></figcaption>
                  <select class="ps-rating" data-read-only="true">
                    <option value="1">1</option>
                    <option value="1">2</option>
                    <option value="1">3</option>
                    <option value="1">4</option>
                    <option value="2">5</option>
                  </select>
                </figure>
                <p>Nam ac elit a ante commodo tristique. Duis lacus urna, condimentum a vehicula a, hendrerit ac nisi Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vulputate, tortor nec commodo ultricies, vitae viverra urna nulla sed turpis. Curabitur sed turpis feugiat, mollis felis vel, viverra metus. Sed vel nulla non neque dictum imperdiet. Aliquam egestas hendrerit euismod.</p>
              </div>
            </div>
          </div>
          <form class="ps-form--review" action="http://nouthemes.net/html/chikery/index.html" method="get">
            <div class="ps-form__header">
              <h4>Add your review</h4>
            </div>
            <div class="row">
              <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 ">
                <div class="form-group form-group--inline">
                  <label>Your rating:</label>
                  <div class="form-group__content">
                    <select class="ps-rating" data-read-only="false">
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 ">
                <div class="row">
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12  ">
                    <div class="form-group">
                      <input class="form-control" type="text" placeholder="Your Name">
                    </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12  ">
                    <div class="form-group">
                      <input class="form-control" type="email" placeholder="Your Email">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" rows="6" placeholder="Write your review here"></textarea>
                </div>
                <div class="form-group submit">
                  <button class="ps-btn">Submit Review</button>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="ps-tab" id="tab-3">
          <p>{!!$pro->content!!}</p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="ps-section ps-related-product">
  <div class="container">
    <div class="ps-section__header">
      <p>You may also like</p>
      <h3>Related Products</h3><i class="chikery-tt3"></i>
    </div>
    <div class="ps-section__content">
      <div class="row">
        @foreach($relate_pro as $model)
        <?php 
          $rl_price = $model->price;
          $rl_sale_price = $model->sale_price;  
          $rl_sale_percent = round(($rl_price-$rl_sale_price)/$rl_price*100);
        ?>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 ">
          <div class="ps-product">
            <div class="ps-product__thumbnail">
              <img src="{{url('public/uploads/product')}}/{{$model->product->image}}" alt=""/>
              <a class="ps-product__overlay" href="product-default.html"></a>
              @if($rl_sale_price)
              <span class="ps-badge ps-badge--sale sale_price"><i>{{$rl_sale_percent}}%</i></span>
              @endif
            </div>
            <div class="ps-product__content">
              <div class="ps-product__desc"><a class="ps-product__title" href="product-default.html">{{$model->product->name}}</a>
                <p><span>{{$model->product->weight}}g</span></p><span class="ps-product__price sale">
                  @if(is_null($rl_sale_price))
                    ${{$rl_price}}
                  @else
                    <del>${{$rl_price}}</del> ${{$rl_sale_price}}
                  @endif
                </span>
              </div>
              <div class="ps-product__shopping"><a class="ps-btn ps-product__add-to-cart" href="{{route('cart.add',['id'=>$model->product->id,'size_id'=>$model->size_id])}}">Add to cart</a>
                <div class="ps-product__actions">
                  @if(Auth::guard('customer')->check())
                  <?php $flag2 = $whishlist->where('customer_id',$user->id)->where('product_id',$model->product_id)->where('size_id',$model->size_id)->first(); ?>
                  <a href="" class="whishlist_btn {{$flag2?'active':''}}"><i class="fa fa-heart-o"></i></a>
                  @endif
                  <input type="hidden" value="{{$model->product->id}}">
                  <input type="hidden" value="{{$model->size_id}}">
                  <a href="#"><i class="fa fa-random"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    <div class="ps-section__footer"><a class="ps-btn ps-btn--outline" href="{{route('shop')}}"> All products</a></div>
  </div>
</div>
@stop

@section('js')
<script>
  $(document).ready(function () {
    var formatter = new Intl.NumberFormat('en-US', {
      style: 'currency',
      currency: 'USD'
    });

    $('.form-group--number button').click(function () {       //change quantity
      var quantity = parseInt($(this).siblings('input').val());
      if($(this).hasClass('up')){
        quantity += 1;
      }
      else{
        if(quantity>1){
          quantity -= 1;
        }
      }
      $(this).siblings('input').attr('value',quantity);
    });

    $('.size_box').change(function(){     //change size
      var customer_id = {{Auth::guard('customer')->check()?Auth::guard('customer')->user()->id:'null'}}
      $('.load-animation').css('display','flex');
      $.ajax({
        type: 'GET',
        url: '{{url("api/product-detail/change-size")}}',
        data: {pro_id: {{$pro->id}},size_id: $(this).val(),customer_id: customer_id},
        dataType: 'json',
        success: function (res) {
          if(res.pro_dt.sale_price){
            $('.pro_price').html(
              '<del>' + formatter.format(res.pro_dt.price) + '</del> ' + formatter.format(res.pro_dt.sale_price)
            );
          }
          else{
            $('.pro_price').html(formatter.format(res.pro_dt.price));
          }
          if(res.flag==0){
            $('.dt_whishlist').removeClass('active');
          }
          else{
            $('.dt_whishlist').addClass('active');
          }
          $('.load-animation').css('display','none');
        }
      });
    });

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

    $('.dt_whishlist').click(function(){
			$('.load-animation').css('display','flex');
			if($(this).hasClass('active')){
				$.ajax({
					url: '{{url("api/remove/whishlist")}}',
					type: "POST",
					data: {customer_id: {{Auth::guard('customer')->check()?Auth::guard('customer')->user()->id:'null'}},product_id: $(this).next().val(),size_id: $('.size_box').val()},
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
					data: {customer_id: {{Auth::guard('customer')->check()?Auth::guard('customer')->user()->id:'null'}},product_id: $(this).next().val(),size_id: $('.size_box').val()},
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