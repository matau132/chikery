@extends('master')
@section('title','Product Detail')
@section('class','product-detail')
@section('main')
<div class="container">
  <div class="ps-product--detail">
    <div class="ps-product__header">
      <div class="ps-product__thumbnail" data-vertical="false">
        <figure>
          <div class="ps-wrapper"><span class="ps-badge ps-badge--sale"><i>30%</i></span>
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
      <div class="ps-product__info">
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
        <h4 class="ps-product__price sale">
          @if(!is_null($pro->sale_price))
              <del>${{$pro->price}}</del> ${{$pro->sale_price}}
            @else
            ${{$pro->price}}
            @endif
        </h4>
        <div class="ps-product__desc">
          <p>{!!Str::limit($pro->summary,500)!!}</p>
        </div>
        <div class="ps-product__specification">
          <p><strong>AVAILABILITY:</strong>InStock</p>
          <p><strong> CATEGORIES:</strong><a href="shop-default.html">{{$pro->category->name}}</a></p>
        </div>
        <div class="ps-product__shopping">
          <select class="ps-select" title="Choose Size">
            <option value="1">Small</option>
            <option value="2">Medium</option>
            <option value="3">Large</option>
          </select>
          <div class="form-group--number">
            <button class="up"></button>
            <button class="down"></button>
            <input class="form-control" type="text" placeholder="1">
          </div><a class="ps-btn" href="shopping-cart.html">Order now</a>
          <div class="ps-product__actions"><a href="#"><i class="icon-heart"></i></a><a href="#"><i class="icon-chart-bars"></i></a></div>
        </div>
        <div class="ps-product__sharing">
          <div class="ps-product__actions"><a href="#"><i class="fa fa-heart-o"></i></a><a href="#"><i class="fa fa-random"></i></a></div>
          <p>Share This:<a class="facebook" href="#"><i class="fa fa-facebook"></i></a><a class="twitter" href="#"><i class="fa fa-twitter"></i></a><a class="google" href="#"><i class="fa fa-google-plus"></i></a><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></p>
        </div>
      </div>
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
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 ">
          <div class="ps-product">
            <div class="ps-product__thumbnail"><img src="{{url('public/uploads/product')}}/{{$model->image}}" alt=""/><a class="ps-product__overlay" href="product-default.html"></a>
            </div>
            <div class="ps-product__content">
              <div class="ps-product__desc"><a class="ps-product__title" href="product-default.html">{{$model->name}}</a>
                <p><span>{{$model->weight}}g</span></p><span class="ps-product__price sale">
                  @if(is_null($model->sale_price))
                    ${{$model->price}}
                  @else
                    <del>${{$model->price}}</del> ${{$model->sale_price}}
                  @endif
                </span>
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
    <div class="ps-section__footer"><a class="ps-btn ps-btn--outline" href="{{route('shop')}}"> All products</a></div>
  </div>
</div>
@stop