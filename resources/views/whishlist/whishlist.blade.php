@extends('master')
@section('title','Whishlist')
@section('class','whishlist ps-page')
@section('main')
<div class="container">
  <div class="ps-whishlist">
    <div class="table-responsive">
      <table class="table ps-table ps-table--whishlist">
        <thead>
          <tr>
            <th>Product Name</th>
            <th>Unit Price</th>
            <th>Stock Status</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <div class="ps-product--cart">
                <div class="ps-product__thumbnail"><img src="{{url('public/uploads')}}/product/3.png" alt=""><a class="ps-product__overlay" href="product-detail.html"></a></div>
                <div class="ps-product__content"><a class="ps-product__title" href="product-detail.html">Jean Woman Summer</a></div>
              </div>
            </td>
            <td>$12.00</td>
            <td><span class="ps-instock">Instock</span></td>
            <td class="ps-table__actions"><a class="ps-btn" href="#"> Add to cart</a><a class="ps-btn--close" href="#"></a></td>
          </tr>
          <tr>
            <td>
              <div class="ps-product--cart">
                <div class="ps-product__thumbnail"><img src="{{url('public/uploads')}}/product/5.png" alt=""><a class="ps-product__overlay" href="product-detail.html"></a></div>
                <div class="ps-product__content"><a class="ps-product__title" href="product-detail.html">Jean Woman Summer</a></div>
              </div>
            </td>
            <td>$12.00</td>
            <td><span class="ps-instock">Instock</span></td>
            <td class="ps-table__actions"><a class="ps-btn" href="#"> Add to cart</a><a class="ps-btn--close" href="#"></a></td>
          </tr>
          <tr>
            <td>
              <div class="ps-product--cart">
                <div class="ps-product__thumbnail"><img src="{{url('public/uploads')}}/product/7.png" alt=""><a class="ps-product__overlay" href="product-detail.html"></a></div>
                <div class="ps-product__content"><a class="ps-product__title" href="product-detail.html">Jean Woman Summer</a></div>
              </div>
            </td>
            <td>$12.00</td>
            <td><span class="ps-instock">Instock</span></td>
            <td class="ps-table__actions"><a class="ps-btn" href="#"> Add to cart</a><a class="ps-btn--close" href="#"></a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@stop