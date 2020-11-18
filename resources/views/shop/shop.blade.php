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
            <li><a href="shop-default.html">Bready</a></li>
            <li><a href="shop-default.html">Pinpool</a></li>
            <li><a href="shop-default.html">Deliciuex</a></li>
            <li><a href="shop-default.html">Cake</a></li>
            <li><a href="shop-default.html">Cupke</a></li>
          </ul>
        </aside>
        <aside class="widget widget_shop widget_shop-filter">
          <h3 class="widget-title">Filter price</h3>
          <div class="ps-slider" data-default-min="0" data-default-max="100" data-max="100" data-step="5" data-unit="$"></div>
          <p class="ps-slider__meta">Price:<span class="ps-slider__value ps-slider__min"></span>-<span class="ps-slider__value ps-slider__max"></span></p>
        </aside>
        <aside class="widget widget_shop widget_shop-ingredients">
          <h3 class="widget-title">Ingredient</h3>
          <div class="ps-checkbox ps-checkbox--circle">
            <input class="form-control" type="checkbox" id="ingredient-1" name="ingredient"/>
            <label for="ingredient-1">Sugar</label>
          </div>
          <div class="ps-checkbox ps-checkbox--circle">
            <input class="form-control" type="checkbox" id="ingredient-2" name="ingredient"/>
            <label for="ingredient-2">Chocolate</label>
          </div>
          <div class="ps-checkbox ps-checkbox--circle">
            <input class="form-control" type="checkbox" id="ingredient-3" name="ingredient"/>
            <label for="ingredient-3">White Flour</label>
          </div>
          <div class="ps-checkbox ps-checkbox--circle">
            <input class="form-control" type="checkbox" id="ingredient-4" name="ingredient"/>
            <label for="ingredient-4">Cream</label>
          </div>
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
        <div class="ps-product-box">
          <div class="row">
            @foreach($pros as $models)
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 ">
              <div class="ps-product">
                <div class="ps-product__thumbnail"><img src="{{url('public/uploads/product')}}/{{$models->image}}"  class="img-fluid max-width: 100% height:auto" alt=""/><a class="ps-product__overlay" href="product-default.html"></a>
                </div>
                <div class="ps-product__content">
                  <div class="ps-product__desc"><a class="ps-product__title" href="product-default.html">Red sugar flower</a>
                    <p><span>350g</span><span>30 Min</span><span>120 <sup>o</sup>C</span></p><span class="ps-product__price">${{$models->price}}</span>
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
      </div>
    </div>
  </div>
</div>
@stop