@extends('master')
@section('title','Shop Products')
@section('class','shopping')
@section('main')
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
              @foreach($recent_prods as $recent_prod)
              <?php 
                $rc_size_id = $recent_prod->sizes->first()->id;
                $rc_price = $size_dt->where('product_id',$recent_prod->id)->where('size_id',$rc_size_id)->first()->price;
                $rc_sale_price = $size_dt->where('product_id',$recent_prod->id)->where('size_id',$rc_size_id)->first()->sale_price;  
              ?>
              <div class="ps-product--sidebar">
                <div class="ps-product__thumbnail"><img src="{{url('public/uploads/product')}}/{{$recent_prod->image}}" alt=""/><a class="ps-product__overlay" href="{{route('shop.detail',[$recent_prod->id,Str::slug($recent_prod->name)])}}"></a></div>
                <div class="ps-product__content pt-3"><a class="ps-product__title mb-0" href="{{route('shop.detail',[$recent_prod->id,Str::slug($recent_prod->name)])}}">{{$recent_prod->name}}</a>
                  <p style="line-height: 1.6rem"><span>{{$recent_prod->weight}}g</span></p><span class="ps-product__price sale">
                    @if(is_null($rc_sale_price))
                      ${{number_format($rc_price,2)}}
                    @else
                      <del style="color: #555;font-size: 20px;">${{number_format($rc_price,2)}}</del> ${{number_format($rc_sale_price,2)}}
                    @endif
                  </span>
                </div>
              </div>
              @endforeach
            </aside>
          </div>
          <div class="ps-shopping__right">
            <div class="ps-shopping__top">
              @if($pros->currentPage()==$pros->lastPage())
              <p>Show {{$pros->perPage()*($pros->currentPage()-1)+1}}-{{$pros->total()}} of {{$pros->total()}} result</p>
              @else
              <p>Show {{$pros->perPage()*($pros->currentPage()-1)+1}}-{{$pros->currentPage()*$pros->perPage()}} of {{$pros->total()}} result</p>
              @endif
              <figure>
                <select class="ps-select shop-sorting" title="Default Sorting">
                  <option value="1">Default Sorting 1</option>
                  <option value="2">Default Sorting 2</option>
                  <option value="3">Default Sorting 3</option>
                </select>
              </figure>
            </div>

            @yield('shop-main')

            
          </div>
        </div>
      </div>
    </div>
@stop