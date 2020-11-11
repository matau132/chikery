@extends('master')
@section('main')
<div class="ps-page">
      <div class="ps-hero bg--cover" data-background="{{url('public/uploads')}}/hero/shop-hero.png">
        <div class="ps-hero__container">
          <div class="ps-breadcrumb">
            <ul class="breadcrumb">
              <li><a href="index-2.html">Home</a></li>
              <li>Blog Grid</li>
            </ul>
          </div>
          <h1 class="ps-hero__heading">Blog & News</h1>
        </div>
      </div>
      <div class="container">
        <div class="ps-blog">
          <div class="masonry-wrapper" data-col-md="3" data-col-sm="2" data-col-xs="1" data-gap="30" data-radio="100%">
            <div class="ps-masonry">
              <div class="grid-sizer"></div>
              <div class="grid-item">
                <div class="grid-item__content-wrapper">
                  <div class="ps-post">
                    <div class="ps-post__thumbnail"><img src="{{url('public/uploads')}}/blog/blog-grid/1.jpg" alt=""/><a class="ps-post__overlay" href="blog-detail.html"></a></div>
                    <div class="ps-post__content">
                      <p class="ps-post__meta">March 31, 2019  by<a href="#"> Admin</a></p><a class="ps-post__title" href="blog-detail.html">Class aptent taciti sociosqu ad litora torquent per conubia</a><a class="ps-post__morelink" href="blog-detail.html">Read More</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="grid-item">
                <div class="grid-item__content-wrapper">
                  <div class="ps-post">
                    <div class="ps-post__thumbnail"><img src="{{url('public/uploads')}}/blog/blog-grid/2.jpg" alt=""/><a class="ps-post__overlay" href="blog-detail.html"></a></div>
                    <div class="ps-post__content">
                      <p class="ps-post__meta">March 31, 2019  by<a href="#"> Admin</a></p><a class="ps-post__title" href="blog-detail.html">Class aptent taciti sociosqu ad litora torquent per conubia</a><a class="ps-post__morelink" href="blog-detail.html">Read More</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="grid-item">
                <div class="grid-item__content-wrapper">
                  <div class="ps-post">
                    <div class="ps-post__thumbnail"><img src="{{url('public/uploads')}}/blog/blog-grid/3.jpg" alt=""/><a class="ps-post__overlay" href="blog-detail.html"></a></div>
                    <div class="ps-post__content">
                      <p class="ps-post__meta">March 31, 2019  by<a href="#"> Admin</a></p><a class="ps-post__title" href="blog-detail.html">Class aptent taciti sociosqu ad litora torquent per conubia</a><a class="ps-post__morelink" href="blog-detail.html">Read More</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="grid-item">
                <div class="grid-item__content-wrapper">
                  <div class="ps-post">
                    <div class="ps-post__thumbnail"><img src="{{url('public/uploads')}}/blog/blog-grid/4.jpg" alt=""/><a class="ps-post__overlay" href="blog-detail.html"></a></div>
                    <div class="ps-post__content">
                      <p class="ps-post__meta">March 31, 2019  by<a href="#"> Admin</a></p><a class="ps-post__title" href="blog-detail.html">Class aptent taciti sociosqu ad litora torquent per conubia</a><a class="ps-post__morelink" href="blog-detail.html">Read More</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="grid-item">
                <div class="grid-item__content-wrapper">
                  <div class="ps-post">
                    <div class="ps-post__thumbnail"><img src="{{url('public/uploads')}}/blog/blog-grid/5.jpg" alt=""/><a class="ps-post__overlay" href="blog-detail.html"></a></div>
                    <div class="ps-post__content">
                      <p class="ps-post__meta">March 31, 2019  by<a href="#"> Admin</a></p><a class="ps-post__title" href="blog-detail.html">Class aptent taciti sociosqu ad litora torquent per conubia</a><a class="ps-post__morelink" href="blog-detail.html">Read More</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="grid-item">
                <div class="grid-item__content-wrapper">
                  <div class="ps-post">
                    <div class="ps-post__thumbnail"><img src="{{url('public/uploads')}}/blog/blog-grid/6.jpg" alt=""/><a class="ps-post__overlay" href="blog-detail.html"></a></div>
                    <div class="ps-post__content">
                      <p class="ps-post__meta">March 31, 2019  by<a href="#"> Admin</a></p><a class="ps-post__title" href="blog-detail.html">Class aptent taciti sociosqu ad litora torquent per conubia</a><a class="ps-post__morelink" href="blog-detail.html">Read More</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="ps-blog__footer"><a class="ps-btn ps-btn--outline" href="#"> LOAD MORE</a></div>
        </div>
      </div>
    </div>
@stop