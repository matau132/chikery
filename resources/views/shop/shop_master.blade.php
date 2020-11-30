@extends('master')
@section('main')
<div class="ps-hero ps-hero--shopping bg--cover" data-background="{{url('public/uploads')}}/hero/shop-hero.png">
      <div class="ps-hero__container">
        <div class="ps-breadcrumb">
          <ul class="breadcrumb">
            <li><a href="index-2.html">Home</a></li>
            <li>Shop Page</li>
          </ul>
        </div>
        <h1 class="ps-hero__heading">Shop Products</h1>
      </div>
    </div>
    <div class="ps-page--shop">
      <div class="container">
        <div class="ps-shopping">
          <div class="ps-shopping__left">
            <aside class="widget widget_shop widget_categories">
              <h3 class="widget-title">Categories</h3>
              <ul>
                @foreach($cats as $model)
                <li><a href="{{route('shop.category',[$model->id, Str::slug($model->name)])}}">{{$model->name}}</a></li>
                @endforeach
              </ul>
            </aside>
            <aside class="widget widget_shop widget_shop-filter">
              <h3 class="widget-title">Filter price</h3>
              <div class="ps-slider" data-default-min="0" data-default-max="100" data-max="100" data-step="5" data-unit="$"></div>
              <p class="ps-slider__meta">Price:<span class="ps-slider__value ps-slider__min"></span>-<span class="ps-slider__value ps-slider__max"></span></p>
            </aside>
            <aside class="widget widget_shop widget_shop-ingredients">
              <h3 class="widget-title">Ingredient</h3>
              @foreach($ingre as $model)
              <div class="ps-checkbox ps-checkbox--circle">
                <input class="form-control" type="checkbox" id="{{$model->name}}" name="ingredient" {{$ingre_id==$model->id?'checked':''}}/>
                  <label for="{{$model->name}}"><a href="{{route('shop.ingredient',[$model->id, Str::slug($model->name)])}}" style="font-size: 20px;font-weight: 600;color: #555;">{{$model->name}}</a></label>
              </div>
              @endforeach
            </aside>
            <aside class="widget widget_shop widget_recent-product">
              <h3 class="widget-title">Recent Products</h3>
              <div class="ps-product--sidebar">
                <div class="ps-product__thumbnail"><img src="{{url('public/uploads')}}/product/17.png" alt=""/><a class="ps-product__overlay" href="product-default.html"></a></div>
                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Red sugar flower</a>
                  <p><span>350g</span><span>30 Min</span><span>120 <sup>o</sup>C</span></p><span class="ps-product__price">$12.00</span>
                </div>
              </div>
              <div class="ps-product--sidebar">
                <div class="ps-product__thumbnail"><img src="{{url('public/uploads')}}/product/18.png" alt=""/><a class="ps-product__overlay" href="product-default.html"></a></div>
                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Red sugar flower</a>
                  <p><span>350g</span><span>30 Min</span><span>120 <sup>o</sup>C</span></p><span class="ps-product__price">$12.00</span>
                </div>
              </div>
              <div class="ps-product--sidebar">
                <div class="ps-product__thumbnail"><img src="{{url('public/uploads')}}/product/19.png" alt=""/><a class="ps-product__overlay" href="product-default.html"></a></div>
                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Red sugar flower</a>
                  <p><span>350g</span><span>30 Min</span><span>120 <sup>o</sup>C</span></p><span class="ps-product__price sale"><del>$16.00</del> $12.00</span>
                </div>
              </div>
            </aside>
          </div>
          <div class="ps-shopping__right">
            <div class="ps-shopping__top">
              <p>Show 1-12 of 35 result</p>
              <figure>
                <select class="ps-select" title="Default Sorting">
                  <option value="1">Default Sorting 1</option>
                  <option value="2">Default Sorting 2</option>
                  <option value="3">Default Sorting 3</option>
                </select><a href="#"><i class="fa fa-bars"></i></a><a class="active" href="#"><i class="fa fa-th"></i></a>
              </figure>
            </div>

            @yield('shop-main')

            
          </div>
        </div>
      </div>
    </div>
@stop