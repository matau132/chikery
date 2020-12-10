@extends('master')
@section('title','About Us')
@section('class','about')
@section('main')
<div class="ps-section ps-home-awards bg--cover" data-background="{{url('public/uploads')}}/bg/home-2/home-award.jpg">
  <div class="container">
    <div class="ps-section__header">
      <p>CHIKER STORE</p>
      <h3>Our Awards</h3><i class="chikery-tt3"></i>
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
              <h4>CUPCAKES SHOP OF THE YEAR</h4>
              <p>2012 - 2018</p>
            </div>
            <div class="ps-block__content">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sed turpis feugiat, mollis felis vel, viverra metus.</p>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
          <div class="ps-block--award">
            <div class="ps-block__header"><img src="{{url('public/uploads')}}/awards/3.png" alt="">
              <h4>Awards Bakery academy</h4>
              <p>2012 - 2018</p>
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
<div class="ps-section ps-home-about">
  <div class="container">
    <div class="row">
      <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
        <div class="ps-section__header">
          <p>WELCOME TO CHIKERY</p>
          <h3>Chikery Cake History</h3><i class="chikery-tt1"></i>
        </div>
        <div class="ps-section__content">
          <p>“ Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sed turpis feugiat, mollis felis vel, viverra metus. Sed vel nulla non neque dictum imperdiet hendrerit ”</p>
          <div class="ps-section__image"><img src="{{url('public/uploads')}}/homepage/home-1/signature.png" alt=""></div>
          <h5><span>Marry Lulie</span> - Ceo Chikery</h5>
        </div>
      </div>
      <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
        <div class="ps-section__image"><img src="{{url('public/uploads')}}/homepage/home-3/home-about.png" alt=""></div>
      </div>
    </div>
  </div>
</div>
<div class="ps-section ps-home-best-services">
  <div class="ps-section__left bg--cover" data-background="{{url('public/uploads')}}/bg/home-1/home-best-services.jpg"></div>
  <div class="ps-section__right">
    <div class="ps-section__container">
      <div class="ps-section__header">
        <p>CHIKERY CAKE</p>
        <h3>Best Services</h3><i class="chikery-tt3"></i>
      </div>
      <div class="ps-section__content">
        <p>Consectetur adipiscing elit. Curabitur sed turpis feugiat, sed vel nulla non neque. Nullamlacinia faucibus risus, a euismod lorem tincidunt id. Vestibulum imperdiet nibh vel magna lacinia ultricesimperdiet.</p>
        <ul>
          <li>BEST QUALITY</li>
          <li>FAST DELIVERED</li>
          <li>Event Cakes</li>
          <li>INGREDIENT SUPPLY</li>
          <li>ONLINE BOOKING</li>
        </ul>
      </div>
    </div>
    <div class="ps-section__image bg--cover" data-background="{{url('public/uploads')}}/bg/home-1/home-best-services-2.jpg"></div>
  </div>
</div>
<div class="ps-section ps-home-video bg--cover" data-background="{{url('public/uploads')}}/bg/pages/about-video.jpg">
  <div class="container">
    <div class="ps-section__header">
      <p>Video Present</p>
      <h3>Any Design <br/> For Your Feast-day</h3><a class="ps-video" href="#"><i class="fa fa-play"></i></a>
    </div>
  </div>
</div>
<div class="ps-section ps-home-good-baker">
  <div class="container">
    <div class="ps-section__header">
      <p>Our baker</p>
      <h3>The Good Baker</h3><i class="chikery-tt1"></i>
    </div>
    <div class="ps-section__content">
      <div class="ps-block--good-baker">
        <div class="ps-block__left"><img src="{{url('public/uploads')}}/homepage/home-3/good-baker.png" alt=""></div>
        <div class="ps-block__right">
          <h4>Jont Henrry</h4>
          <h5>Chef, Co - accfounder</h5>
          <p>Sed id interdum urna. Nam ac elit a ante commodo tristique. Duis lacus urna, condimentum a vehicula a, hendrerit ac nisi Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sed turpis feugiat, mollis felis vel, viverra metus. Sed vel nulla non neque dictum imperdiet. Aliquam egestas hendrerit euismod.</p>
          <div class="ps-block__images"><img src="{{url('public/uploads')}}/users/bakers/1.png" alt=""><img src="{{url('public/uploads')}}/users/bakers/2.png" alt=""><img src="{{url('public/uploads')}}/users/bakers/3.png" alt=""></div>
        </div>
      </div>
    </div>
  </div>
</div>    
@stop 