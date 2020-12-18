<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from nouthemes.net/html/chikery/homepage-5.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 03 Nov 2020 15:37:06 GMT -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="author" content="">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <title>Chikery | HTML Template</title><link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300i,400,400i,500,500i,600,600i,700&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{url('public/site')}}/plugins/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{url('public/site')}}/plugins/bootstrap4/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{url('public/site')}}/plugins/owl-carousel/assets/owl.carousel.css">
  <link rel="stylesheet" href="{{url('public/site')}}/plugins/slick/slick/slick.css">
  <link rel="stylesheet" href="{{url('public/site')}}/plugins/lightGallery-master/dist/css/lightgallery.min.css">
  <link rel="stylesheet" href="{{url('public/site')}}/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css">
  <link rel="stylesheet" href="{{url('public/site')}}/plugins/jquery-ui/jquery-ui.min.css">
  <link rel="stylesheet" href="{{url('public/site')}}/plugins/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="{{url('public/site')}}/plugins/chikery-icon/style.css">
  <link rel="stylesheet" href="{{url('public/site')}}/css/style.css">
</head>
<body>
  <header class="header header--default header--home-4 white" data-sticky="true">
    <div class="header__left">
      <ul class="ps-list--social">
        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
      </ul>
    </div>
    <div class="header__center">
      <nav class="header__navigation left">
        <ul class="menu">
          <li class="current-menu-item menu-item-has-children"><a href="{{route('home')}}">Home</a>
          </li>
          <li class="menu-item-has-children"><a href="{{route('shop')}}">Shop</a>
          </li>
          <li><a href="{{route('about')}}">About</a>
          </li>
        </ul>
      </nav>
      <div class="header__logo"><a class="ps-logo" href="{{route('home')}}"><img src="{{url('public/uploads')}}/logo.png" alt=""></a></div>
      <nav class="header__navigation right">
        <ul class="menu">
          <li class="current-menu-item menu-item-has-children"><a href="{{route('checkout')}}">Pages</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
            <ul class="sub-menu">
              <li><a href="{{route('checkout')}}">Checkout</a>
              </li>
              <li><a href="{{route('whishlist')}}">Whishlist</a>
              </li>
            </ul>
          </li>
          <li class="menu-item-has-children"><a href="{{route('blog')}}">News</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
            <ul class="sub-menu">
              <li><a href="{{route('about')}}">About</a>
              </li>
              <li><a href="{{route('blog')}}">Blog</a>
              </li>
            </ul>
          </li>
          <li><a href="{{route('contact')}}">Contact</a>
          </li>
        </ul>
      </nav>
    </div>
    <div class="header__right">
      <div class="header__actions"><a class="ps-search-btn" href="#"><i class="fa fa-search"></i></a><a href="#"><i class="fa fa-heart-o"></i></a>
        <x-cart />
      </div>
    </div>
  </header>
  <header class="header header--mobile" data-sticky="false">
    <div class="header__content">
      <div class="header__left"><a class="ps-toggle--sidebar" href="#navigation-mobile"><i class="fa fa-bars"></i></a></div>
      <div class="header__center"><a class="ps-logo" href="{{route('home')}}"><img src="{{url('public/uploads')}}/logo.png" alt=""></a></div>
      <div class="header__right">
        <div class="header__actions"><a href="#"><i class="fa fa-heart-o"></i></a></div>
      </div>
    </div>
  </header>
  
  <x-cart_mobile />

  <div class="ps-panel--sidebar" id="navigation-mobile">
    <div class="ps-panel__header">
      <h3>Menu</h3>
    </div>
    <div class="ps-panel__content">
      <ul class="menu--mobile">
        <li class="current-menu-item menu-item-has-children"><a href="{{route('home')}}">Home</a>
        </li>
        <li class="menu-item-has-children"><a href="{{route('shop')}}">Shop</a>
        </li>
        <li><a href="{{route('about')}}">About</a>
        </li>
        <li class="current-menu-item menu-item-has-children"><a href="{{route('checkout')}}">Pages</a><span class="sub-toggle"></span>
          <ul class="sub-menu">
            <li><a href="{{route('checkout')}}">Checkout</a>
            </li>
            <li><a href="{{route('whishlist')}}">Whishlist</a>
            </li>
          </ul>
        </li>
        <li class="menu-item-has-children"><a href="{{route('blog')}}">News</a><span class="sub-toggle"></span>
          <ul class="sub-menu">
            <li><a href="{{route('about')}}">About</a>
            </li>
            <li><a href="{{route('blog')}}">Blog</a>
            </li>
          </ul>
        </li>
        <li><a href="{{route('contact')}}">Contact</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="navigation--list">
    <div class="navigation__content"><a class="navigation__item active" href="{{route('home')}}"><i class="fa fa-home"></i></a><a class="navigation__item ps-toggle--sidebar" href="#navigation-mobile"><i class="fa fa-bars"></i></a><a class="navigation__item ps-toggle--sidebar" href="#search-sidebar"><i class="fa fa-search"></i></a><a class="navigation__item ps-toggle--sidebar" href="#cart-mobile"><i class="fa fa-shopping-basket"></i></a></div>
  </div>
  <!--include search-sidebar-->

  <div id="homepage-5">
    <div class="ps-home-banner">
      <div class="ps-carousel--dots owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="off">
        <div class="ps-banner ps-banner--1 bg--cover" data-background="{{url('public/uploads')}}/banner/home-5/1.jpg">
          <div class="ps-banner__content">
            <h3 data-animation-in="fadeInDown" data-animation-out="animate-out fadeOutRight">Super Delicious Cakes</h3>
            <p data-animation-in="fadeInDown" data-animation-out="animate-out fadeOutRight">100% Natural, FRESH baked goods</p><a class="ps-btn" href="#" data-animation-in="fadeInDown" data-animation-out="animate-out fadeOutRight">Order Now</a>
          </div>
        </div>
        <div class="ps-banner ps-banner--1 bg--cover" data-background="{{url('public/uploads')}}/banner/home-5/2.jpg">
          <div class="ps-banner__content">
            <h3 data-animation-in="fadeInDown" data-animation-out="animate-out fadeOutRight">Super Delicious Cakes</h3>
            <p data-animation-in="fadeInDown" data-animation-out="animate-out fadeOutRight">100% Natural, FRESH baked goods</p><a class="ps-btn" href="#" data-animation-in="fadeInDown" data-animation-out="animate-out fadeOutRight">Order Now</a>
          </div>
        </div>
        <div class="ps-banner ps-banner--1 bg--cover" data-background="{{url('public/uploads')}}/banner/home-5/3.jpg">
          <div class="ps-banner__content">
            <h3 data-animation-in="fadeInDown" data-animation-out="animate-out fadeOutRight">Super Delicious Cakes</h3>
            <p data-animation-in="fadeInDown" data-animation-out="animate-out fadeOutRight">100% Natural, FRESH baked goods</p><a class="ps-btn" href="#" data-animation-in="fadeInDown" data-animation-out="animate-out fadeOutRight">Order Now</a>
          </div>
        </div>
      </div>
    </div>
    <div class="ps-section ps-home-wellcome bg--top" data-background="{{url('public/uploads')}}/bg/home-5/home-wellcome.png">
      <div class="container">
        <div class="ps-section__header">
          <p>WELCOME TO THE STORE</p>
          <h3>Delicious Means chikery</h3><i class="chikery-tt2"></i>
          <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sed turpis feugiat, <br> sed vel nulla non neque dictum imperdiet.</h5>
        </div>
        <div class="ps-section__footer">
          <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
              <div class="ps-block--iconbox"><img src="{{url('public/uploads')}}/homepage/home-5/category-1.png" alt="">
                <h4>Simple Crusty Bread</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sed turpis feugiat, mollis felis vel, viverra metus.</p>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
              <div class="ps-block--iconbox"><img src="{{url('public/uploads')}}/homepage/home-5/category-2.png" alt="">
                <h4>Big Size Cream Cake</h4>
                <p>Sit amet cursus nisl aliquam. Aliquam eu nunc rhoncus viverra quis at felis. Lorem ipsum dolor sit amet  ante commodo tristique.</p>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
              <div class="ps-block--iconbox"><img src="{{url('public/uploads')}}/homepage/home-5/category-3.png" alt="">
                <h4>Delicious Chikery</h4>
                <p>Vestibulum imperdiet nibh vel magna lacinia ultrices. Sed id interdum urna. Nam ac elit a ante commodo tristique.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="ps-section ps-home-about bg--cover" data-background="{{url('public/uploads')}}/bg/home-5/home-about.jpg">
      <div class="container">
        <div class="row">
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
            <div class="ps-section__header">
              <p>Our History</p>
              <h3>Chikery Story</h3><i class="chikery-tt2"></i>
            </div>
            <div class="ps-section__content">
              <p>“ Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sed turpis feugiat, mollis felis vel, viverra metus. Sed vel nulla non neque dictum imperdiet hendrerit ”</p>
              <div class="ps-section__image"><img src="{{url('public/uploads')}}/homepage/home-1/signature.png" alt=""></div>
              <h5><span>Marry Lulie</span> - Ceo Chikery</h5>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
            <div class="ps-section__image"><img src="{{url('public/uploads')}}/homepage/home-5/home-about.png" alt=""></div>
          </div>
        </div>
      </div>
    </div>
    <div class="ps-section ps-home-product">
      <div class="container-fluid">
        <div class="ps-section__header">
          <p>Breads every day</p>
          <h3>New Products</h3><i class="chikery-tt2"></i>
          <h5>Consectetur adipiscing elit. Curabitur sed turpis feugiat,  <br> sed vel nulla non neque dictum imperdiet.</h5>
        </div>
        <div class="ps-section__content">
          <div class="row">
            @foreach($pros as $model)
            <?php 
              $size_id = $model->sizes->first()->id;
              $price = $size_dt->where('product_id',$model->id)->where('size_id',$size_id)->first()->price;
              $sale_price = $size_dt->where('product_id',$model->id)->where('size_id',$size_id)->first()->sale_price;  
              $sale_percent = round(($price-$sale_price)/$price*100);
            ?>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 ">
              <div class="ps-product text-center">
                <div class="ps-product__thumbnail"><img src="{{url('public/uploads/product')}}/{{$model->image}}" style="width: 258.75px; height: 258.75px" alt=""/><a class="ps-product__overlay" href="{{route('shop.detail',[$model->id,Str::slug($model->name)])}}"></a>
                  @if($sale_price)
                  <span class="ps-badge ps-badge--sale sale_price"><i>{{$sale_percent}}%</i></span>
                  @endif
                </div>
                <div class="ps-product__content">
                  <div class="ps-product__desc"><a class="ps-product__title" href="{{route('shop.detail',[$model->id,Str::slug($model->name)])}}">{{$model->name}}</a>
                    <p><span>350g</span></p><span class="ps-product__price sale">
                      @if(is_null($sale_price))
                        ${{number_format($price,2)}}
                      @else
                        <del>${{number_format($price,2)}}</del> ${{number_format($sale_price,2)}}
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
    <div class="ps-section ps-home-awards bg--cover" data-background="{{url('public/uploads')}}/bg/home-5/home-award.jpg">
      <div class="container">
        <div class="ps-section__header">
          <p>CHIKER STORE</p>
          <h3>Our Awards</h3><i class="chikery-tt2"></i>
        </div>
        <div class="ps-section__content">
          <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
              <div class="ps-block--award">
                <div class="ps-block__header"><img src="{{url('public/uploads')}}/awards/1.png" alt="">
                  <h4>BAKERY OF THE YEAR</h4>
                  <p>1990 - 2010</p>
                </div>
                <div class="ps-block__content">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sed turpis feugiat, mollis felis vel, viverra metus.</p>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
              <div class="ps-block--award">
                <div class="ps-block__header"><img src="{{url('public/uploads')}}/awards/2.png" alt="">
                  <h4>BAKERY OF THE YEAR</h4>
                  <p>1990 - 2010</p>
                </div>
                <div class="ps-block__content">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sed turpis feugiat, mollis felis vel, viverra metus.</p>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
              <div class="ps-block--award">
                <div class="ps-block__header"><img src="{{url('public/uploads')}}/awards/3.png" alt="">
                  <h4>BAKERY OF THE YEAR</h4>
                  <p>1990 - 2010</p>
                </div>
                <div class="ps-block__content">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sed turpis feugiat, mollis felis vel, viverra metus.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="ps-section ps-section--good-baker">
      <div class="container">
        <div class="ps-section__left"><img src="{{url('public/uploads')}}/homepage/home-5/good-baker.png" alt=""></div>
        <div class="ps-section__right">
          <div class="ps-section__header">
            <p>Our Baker</p>
            <h3>The Good Baker</h3><i class="chikery-tt2"></i>
          </div>
          <div class="ps-section__content">
            <p>Sed id interdum urna. Nam ac elit a ante commodo tristique. Duis lacus urna, condimentum a vehicula a, hendrerit ac nisi Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sed turpis feugiat, mollis felis vel, viverra metus.</p><a class="ps-btn" href="#"> Read More</a>
          </div>
        </div>
      </div>
    </div>
    <div class="ps-section ps-home-testimonials bg--cover" data-background="{{url('public/uploads')}}/bg/home-5/home-testimonial.jpg">
      <div class="container">
        <div class="ps-section__content">
          <div class="ps-carousel--dots owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
            <div class="ps-block--testimonial">
              <div class="ps-block__header"><img src="{{url('public/uploads')}}/users/1.png" alt=""></div>
              <div class="ps-block__content">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sed turpis feugiat, <span class="hightlight">mollis felis vel, viverra metus. </span>Sed vel nulla non neque dictum imperdiet. Aliquam egestas hendrerit euismod.</p>
              </div>
              <div class="ps-block__footer">
                <p>Marry Lulie</p>
              </div>
            </div>
            <div class="ps-block--testimonial">
              <div class="ps-block__header"><img src="{{url('public/uploads')}}/users/1.png" alt=""></div>
              <div class="ps-block__content">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sed turpis feugiat, <span class="hightlight">mollis felis vel, viverra metus. </span>Sed vel nulla non neque dictum imperdiet. Aliquam egestas hendrerit euismod.</p>
              </div>
              <div class="ps-block__footer">
                <p>Harold M. Clark</p>
              </div>
            </div>
            <div class="ps-block--testimonial">
              <div class="ps-block__header"><img src="{{url('public/uploads')}}/users/1.png" alt=""></div>
              <div class="ps-block__content">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sed turpis feugiat, <span class="hightlight">mollis felis vel, viverra metus. </span>Sed vel nulla non neque dictum imperdiet. Aliquam egestas hendrerit euismod.</p>
              </div>
              <div class="ps-block__footer">
                <p>Timothy A. Mitchell</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="ps-section ps-home-blog">
      <div class="container">
        <div class="ps-section__header">
          <p>Blog & News</p>
          <h3>From Our Archive</h3><i class="chikery-tt2"></i>
        </div>
        <div class="ps-section__content">
          <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
              <div class="ps-post">
                <div class="ps-post__thumbnail"><img src="{{url('public/uploads')}}/blog/home-blog-1.jpg" alt=""><a class="ps-post__overlay" href="blog-detail.html"></a></div>
                <div class="ps-post__content">
                  <p class="ps-post__meta">March 31, 2019  by<a href="#"> Admin</a></p><a class="ps-post__title" href="blog-detail.html">Duis lacus urna condimentum a vehicula consectetur</a><a class="ps-post__morelink" href="blog-detail.html">Read More</a>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
              <div class="ps-post">
                <div class="ps-post__thumbnail"><img src="{{url('public/uploads')}}/blog/home-blog-2.jpg" alt=""><a class="ps-post__overlay" href="blog-detail.html"></a></div>
                <div class="ps-post__content">
                  <p class="ps-post__meta">March 31, 2019  by<a href="#"> Admin</a></p><a class="ps-post__title" href="blog-detail.html">Class aptent taciti sociosqu ad litora torquent per conubia</a><a class="ps-post__morelink" href="blog-detail.html">Read More</a>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
              <div class="ps-post">
                <div class="ps-post__thumbnail"><img src="{{url('public/uploads')}}/blog/home-blog-3.jpg" alt=""><a class="ps-post__overlay" href="blog-detail.html"></a></div>
                <div class="ps-post__content">
                  <p class="ps-post__meta">March 31, 2019  by<a href="#"> Admin</a></p><a class="ps-post__title" href="blog-detail.html">Class aptent taciti sociosqu ad litora torquent per conubia</a><a class="ps-post__morelink" href="blog-detail.html">Read More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="ps-section__footer"><a class="ps-btn ps-btn--outline" href="#">View More</a></div>
      </div>
    </div>
    <div class="ps-section ps-home-book-table dark bg--cover" data-background="{{url('public/uploads')}}/bg/home-2/book-table.jpg">
      <div class="container">
        <div class="row">
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
            <form class="ps-form--book-your-table" action="http://nouthemes.net/html/chikery/index.html" method="get">
              <div class="ps-form__header">
                <h4>Chikery Cake</h4>
                <h3>Book your table</h3>
              </div>
              <div class="ps-form__content">
                <div class="form-group">
                  <input class="form-control" type="text" placeholder="Name">
                </div>
                <div class="form-group">
                  <input class="form-control" type="text" placeholder="Phone">
                </div>
                <div class="form-group">
                  <input class="form-control" type="email" placeholder="Email">
                </div>
                <div class="form-group">
                  <input class="form-control" type="text" placeholder="Number of People">
                </div>
                <div class="form-group">
                  <input class="form-control" type="text" placeholder="Date">
                </div>
                <div class="form-group">
                  <input class="form-control" type="text" placeholder="Time">
                </div>
              </div>
              <div class="ps-form__footer">
                <button class="ps-btn">Book Now</button>
              </div>
            </form>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
            <div class="ps-section__header">
              <p>Chikery Store</p>
              <h3>Upcoming Event</h3>
            </div>
            <div class="ps-section__content">
              <div class="ps-block--upcomming-event">
                <div class="ps-block__content">
                  <h4>Simple Crusty Bread</h4>
                  <h5>TUESDAY 12/04/2018, 7:00AM</h5>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br> Curabitur sed turpis feugiat viverra metus.</p>
                </div>
                <div class="ps-block__footer">
                  <ul class="ps-countdown" data-time="December 30, 2029 24:00:00">
                    <li><span class="hours"></span>
                      <p>Hours</p>
                    </li>
                    <li><span class="minutes"></span>
                      <p>Mins</p>
                    </li>
                    <li><span class="seconds"></span>
                      <p>Seconds</p>
                    </li>
                  </ul><a class="ps-btn" href="#">Reverse now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="ps-footer ps-footer--dark">
    <div class="ps-footer__content">
      <div class="container">
        <div class="ps-footer__left">
          <form class="ps-form--footer-subscribe" action="http://nouthemes.net/html/chikery/index.html" method="get">
            <h3>Get news & offer</h3>
            <p>Sign up for our mailing list to get latest update and offers</p>
            <div class="form-group--inside">
              <input class="form-control" type="text" placeholder="Your email...">
              <button><i class="fa fa-arrow-right"></i></button>
            </div>
            <p>* Don't worry, we never spam</p>
          </form>
        </div>
        <div class="ps-footer__center">
          <div class="ps-site-info"><a class="ps-logo" href="{{route('home')}}"><img src="{{url('public/uploads')}}/logo.png" alt=""></a>
            <p>004 Riley Street, Surry Hills 2050 Sydney, Australia</p>
            <p>Email:<a href="#"> <span class="__cf_email__" data-cfemail="61080f070e210f0e141509040c04124f020e0c">[email&#160;protected]</span></a></p>
            <p>Phone:<span class="ps-hightlight"> +455 45 454555</span></p>
          </div>
        </div>
        <div class="ps-footer__right">
          <aside class="widget widget_footer">
            <h3 class="widget-title">Opening Time</h3>
            <p>Monday - Friday:  <span>08:00 am - 08:30 pm</span></p>
            <p>Saturday - Sunday:  <span>10:00 am - 16:30 pm</span></p>
            <ul class="ps-list--payment-method">
              <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
              <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
              <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
              <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
            </ul>
          </aside>
        </div>
      </div>
    </div>
    <div class="ps-footer__bottom">
      <div class="container">
        <ul class="ps-list--social">
          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
          <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
          <li><a href="#"><i class="fa fa-instagram"></i></a></li>
          <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
        </ul>
        <p>© 2019 Chikery.  Made by<a href="{{route('home')}}"> Nouthemes</a></p>
      </div>
    </div>
  </footer>

  <div id="back2top"><i class="pe-7s-angle-up"></i></div>
  <div class="ps-site-overlay"></div>
  <div id="loader-wrapper">
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
  </div>
  <div class="ps-search" id="site-search"><a class="ps-btn--close" href="#"></a>
    <div class="ps-search__content">

      <x-search/>

    </div>
  </div>
  <!-- Plugins-->
  <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
  <script src="{{url('public/site')}}/plugins/jquery-1.12.4.min.js"></script>
  <script src="{{url('public/site')}}/plugins/owl-carousel/owl.carousel.min.js"></script>
  <script src="{{url('public/site')}}/plugins/bootstrap4/js/bootstrap.min.js"></script>
  <script src="{{url('public/site')}}/plugins/imagesloaded.pkgd.js"></script>
  <script src="{{url('public/site')}}/plugins/masonry.pkgd.min.js"></script>
  <script src="{{url('public/site')}}/plugins/isotope.pkgd.min.js"></script>
  <script src="{{url('public/site')}}/plugins/jquery.matchHeight-min.js"></script>
  <script src="{{url('public/site')}}/plugins/slick/slick/slick.min.js"></script>
  <script src="{{url('public/site')}}/plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
  <script src="{{url('public/site')}}/plugins/slick-animation.min.js"></script>
  <script src="{{url('public/site')}}/plugins/lightGallery-master/dist/js/lightgallery-all.min.js"></script>
  <script src="{{url('public/site')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
  <script src="{{url('public/site')}}/plugins/sticky-sidebar/dist/sticky-sidebar.min.js"></script>
  <script src="{{url('public/site')}}/plugins/jquery.slimscroll.min.js"></script>
  <script src="{{url('public/site')}}/plugins/select2/dist/js/select2.full.min.js"></script>
  <script src="{{url('public/site')}}/plugins/gmap3.min.js"></script>
  <!-- Custom scripts-->
  <script src="{{url('public/site')}}/js/main.js"></script>
  <script src="{{url('public/site')}}/js/customize.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxflHHc5FlDVI-J71pO7hM1QJNW1dRp4U&amp;region=GB"></script>
</body>

<!-- Mirrored from nouthemes.net/html/chikery/homepage-5.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 03 Nov 2020 15:38:32 GMT -->
</html>