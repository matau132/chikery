<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from nouthemes.net/html/chikery/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 03 Nov 2020 15:33:06 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>@yield('title')</title><link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300i,400,400i,500,500i,600,600i,700&amp;display=swap" rel="stylesheet">
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
    <link rel="stylesheet" href="{{url('public/site')}}/css/custom.css">
  </head>
  <body>
    @if(!Auth::guard('customer')->check())
    <div class="user-wrapper d-flex justify-content-end">
      <a href="{{route('user.login')}}" class="login-btn"><i class="fa fa-user pr-2"></i>Login</a>
    </div>
    @else
    <div class="user-wrapper d-flex justify-content-end">
      <span class="position-relative user-hover">
      <a href="{{route('user.profile')}}" class="login-btn user-btn mr-4"><i class="fa fa-user pr-2"></i>{{Auth::guard('customer')->user()->email}}</a>
      <ul class="user-submenu">
        <li><a href="{{route('user.profile')}}">Profile</a></li>
        <li><a href="{{route('user.order')}}">My order</a></li>
        <li><a href="{{route('user.change_pw')}}">Change password</a></li>
      </ul>
    </span>
      <a href="{{route('user.logout')}}" style="margin-right: 30px">Log out</a>
    </div>
    @endif
    <header class="header header--default header--home-4 line" data-sticky="true">
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
            <li class="menu-item-has-children"><a href="{{route('home')}}">Home</a>
            </li>
            <li class="menu-item-has-children"><a href="{{route('shop')}}">Shop</a>
            </li>
            <li class="current-menu-item "><a href="{{route('about')}}">About</a>
            </li>
          </ul>
        </nav>
        <div class="header__logo"><a class="ps-logo" href="{{route('home')}}"><img src="{{url('public/uploads')}}/logo.png" alt=""></a></div>
        <nav class="header__navigation right">
          <ul class="menu">
            <li class="menu-item-has-children"><a href="{{route('checkout')}}">Pages</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
              <ul class="sub-menu">
                <li class="current-menu-item "><a href="{{route('checkout')}}">Checkout</a>
                </li>
                <li class="current-menu-item "><a href="{{route('whishlist')}}">Wishlist</a>
                </li>
              </ul>
            </li>
            <li class="menu-item-has-children"><a href="{{route('blog')}}">News</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
              <ul class="sub-menu">
                <li class="current-menu-item "><a href="{{route('about')}}">About</a>
                </li>
                <li class="current-menu-item "><a href="{{route('blog')}}">Blog</a>
                </li>
              </ul>
            </li>
            <li class="current-menu-item "><a href="{{route('contact')}}">Contact</a>
            </li>
          </ul>
        </nav>
      </div>
      <div class="header__right">
        <div class="header__actions"><a class="ps-search-btn" href="#"><i class="fa fa-search"></i></a><a href="{{route('whishlist')}}"><i class="fa fa-heart-o"></i></a>
          <x-cart />
        </div>
      </div>
    </header>
    <header class="header header--mobile" data-sticky="false">
      <div class="header__content">
        <div class="header__left"><a class="ps-toggle--sidebar" href="#navigation-mobile"><i class="fa fa-bars"></i></a></div>
        <div class="header__center"><a class="ps-logo" href="{{route('home')}}"><img src="{{url('public/uploads')}}/logo.png" alt=""></a></div>
        <div class="header__right">
          <div class="header__actions"><a href="{{route('whishlist')}}"><i class="fa fa-heart-o"></i></a></div>
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
          <li class="menu-item-has-children"><a href="{{route('home')}}">Home</a>
          </li>
          <li class="menu-item-has-children"><a href="{{route('shop')}}">Shop</a>
          </li>
          <li class="current-menu-item "><a href="{{route('about')}}">About</a>
          </li>
          <li class="menu-item-has-children"><a href="{{route('checkout')}}">Pages</a><span class="sub-toggle"></span>
            <ul class="sub-menu">
              <li class="current-menu-item "><a href="{{route('checkout')}}">Checkout</a>
              </li>
              <li class="current-menu-item "><a href="{{route('whishlist')}}">Wishlist</a>
              </li>
            </ul>
          </li>
          <li class="menu-item-has-children"><a href="{{route('blog')}}">News</a><span class="sub-toggle"></span>
            <ul class="sub-menu">
              <li class="current-menu-item "><a href="{{route('about')}}">About</a>
              </li>
              <li class="current-menu-item "><a href="{{route('blog')}}">Blog</a>
              </li>
            </ul>
          </li>
          <li class="current-menu-item "><a href="{{route('contact')}}">Contact</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="navigation--list">
      <div class="navigation__content"><a class="navigation__item active" href="{{route('home')}}"><i class="fa fa-home"></i></a><a class="navigation__item ps-toggle--sidebar" href="#navigation-mobile"><i class="fa fa-bars"></i></a><a class="navigation__item ps-toggle--sidebar" href="#search-sidebar"><i class="fa fa-search" id="pro_search"></i></a><a class="navigation__item ps-toggle--sidebar" href="#cart-mobile"><i class="fa fa-shopping-basket"></i></a></div>
    </div>
    <!--include search-sidebar-->
    <div class="ps-page--@yield('class')">
      <div class="ps-hero bg--cover" data-background="{{url('public/uploads')}}/hero/shop-hero.png">
        <div class="ps-hero__container">
          <div class="ps-breadcrumb">
            <ul class="breadcrumb">
              <li><a href="{{route('home')}}">Home</a></li>
              <li>@yield('title')</li>
            </ul>
          </div>
          <h1 class="ps-hero__heading">@yield('title')</h1>
        </div>
      </div>

      @yield('main')
      
    </div>
    <footer class="ps-footer ps-footer--light">
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
              <p>Email:<a href="#"> <span class="__cf_email__" data-cfemail="c0a9aea6af80aeafb5b4a8a5ada5b3eea3afad">[email&#160;protected]</span></a></p>
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
    <div class="load-animation" style="display: none">
      <div class="loadingio-spinner-rolling-a99t3vhlwoh">
        <div class="ldio-sa9krme0op"><div></div></div>
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
    @yield('js')
    @yield('sub-js')
    <script>
      $(document).ready(function () {
        $('.user-hover').hover(function(){
          $('.user-submenu').slideToggle(400);
        });
      });
    </script>
  </body>

<!-- Mirrored from nouthemes.net/html/chikery/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 03 Nov 2020 15:33:27 GMT -->
</html>