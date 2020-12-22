@extends('master')
@section('title','Contact')
@section('class','contact')
@section('main')
<div class="ps-section ps-contact">
  {{-- <div id="contact-map" data-address="17 Queen St, Southbank, Melbourne 10560, Australia" data-title="Funiture!" data-zoom="17"></div> --}}
  <div class="container">
    <div class="ps-section__header">
      <p>Contact Info</p>
      <h3>No. 342 - London Oxford Street, <br> 012 United Kingdom.</h3>
    </div>
    <div class="ps-section__content">
      <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 ">
          <figure>
            <figcaption>Call us</figcaption>
            <p>Our store:  (032) 3453 456 445</p>
            <p>Brand:  (032) 3454 342 222</p>
          </figure>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 ">
          <figure>
            <figcaption>Email</figcaption>
            <p>Our store:<a href="#"><span class="__cf_email__" data-cfemail="d8b1b6beb798bbb0b1b3bdaaa1f6b6bdac">[email&#160;protected]</span></a></p>
            <p>Support:<a href="#"><span class="__cf_email__" data-cfemail="33604643435c414773505b5a5856414a1d5d5647">[email&#160;protected]</span></a></p>
          </figure>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 ">
          <figure>
            <figcaption>Store At America</figcaption>
            <p>16122 COLLINS VICTORIA 3000</p>
            <p>T:   + 33 323 34522</p>
            <p>E:<a href="#"><span class="__cf_email__" data-cfemail="7c15121a133c11131312081419111952121908">[email&#160;protected]</span></a></p>
          </figure>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 ">
          <figure>
            <figcaption>Store At America</figcaption>
            <p>16122 COLLINS VICTORIA 3000</p>
            <p>T:   + 33 323 34522</p>
            <p>E:<a href="#"><span class="__cf_email__" data-cfemail="432a2d252c032e2c2c2d372b262e266d2d2637">[email&#160;protected]</span></a></p>
          </figure>
        </div>
      </div>
    </div>
    <form class="ps-form--contact" action="http://nouthemes.net/html/chikery/index.html" method="post">
      <div class="ps-form__header">
        <p>Contact</p>
        <h3>Get In touch with us</h3>
      </div>
      <div class="ps-form__content">
        <div class="row">
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
            <div class="form-group">
              <input class="form-control" type="text" placeholder="Your Name">
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
            <div class="form-group">
              <input class="form-control" type="text" placeholder="Your Email">
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
            <div class="form-group">
              <input class="form-control" type="text" placeholder="Phone">
            </div>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
            <div class="form-group">
              <textarea class="form-control" placeholder="Your message here" rows="3"></textarea>
            </div>
          </div>
        </div>
        <div class="ps-form__submit">
          <button class="ps-btn">Submit</button>
        </div>
      </div>
    </form>
  </div>
</div>
@stop