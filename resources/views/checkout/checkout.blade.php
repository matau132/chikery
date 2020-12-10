@extends('master')
@section('title','Checkout')
@section('class','checkout ps-page')
@section('main')
<div class="container">
  <div class="ps-checkout">
    <div class="ps-checkout__left">
      <div class="ps-checkout__header">
        <p>Returning customer ?<a href="#"> Click here to login</a></p>
        <p>Have a Coupon ?<a href="#"> Click here to enter your code</a></p>
      </div>
      <form class="ps-form--checkout" action="http://nouthemes.net/html/chikery/index.html" method="post">
        <h4>Billing Detail</h4>
        <div class="form-group">
          <label>Country</label>
          <select class="ps-select" title="United Kingdom(UK)">
            <option value="1">United Kingdom(UK) 1</option>
            <option value="2">United Kingdom(UK) 2</option>
            <option value="3">United Kingdom(UK) 3</option>
          </select>
        </div>
        <div class="row">
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
            <div class="form-group">
              <label>First Name</label>
              <input class="form-control" type="text" placeholder="">
            </div>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
            <div class="form-group">
              <label>Last Name</label>
              <input class="form-control" type="text" placeholder="">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label>Company Name</label>
          <input class="form-control" type="text" placeholder="">
        </div>
        <div class="form-group">
          <label>Address</label>
          <input class="form-control" type="text" placeholder="">
        </div>
        <div class="form-group">
          <label>City/Town</label>
          <input class="form-control" type="text" placeholder="">
        </div>
        <div class="row">
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
            <div class="form-group">
              <label>Country/States</label>
              <input class="form-control" type="text" placeholder="">
            </div>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
            <div class="form-group">
              <label>Postcode/Zip</label>
              <input class="form-control" type="text" placeholder="">
            </div>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
            <div class="form-group">
              <label>Email</label>
              <input class="form-control" type="text" placeholder="">
            </div>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
            <div class="form-group">
              <label>Phone</label>
              <input class="form-control" type="text" placeholder="">
            </div>
          </div>
        </div>
        <div class="ps-checkbox ps-checkbox--circle different-address">
          <input class="form-control" type="checkbox" id="shipping" name="shipping" checked="checked"/>
          <label for="shipping">Ship to a different address?</label>
        </div>
        <div class="form-group">
          <label>Order Note</label>
          <textarea class="form-control" rows="4" placeholder=""></textarea>
        </div>
        <div class="row">
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
            <div class="form-group">
              <label>Carrier</label>
              <select class="ps-select" title="Carrier">
                <option value="1">Carrier 1</option>
                <option value="2">Carrier 2</option>
                <option value="3">Carrier 3</option>
              </select>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
            <div class="form-group">
              <label>Delivery date</label>
              <input class="form-control ps-datepicker" type="text" placeholder="">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label>Time Slot</label>
          <select class="ps-select" title="Carrier">
            <option value="1">Carrier 1</option>
            <option value="2">Carrier 2</option>
            <option value="3">Carrier 3</option>
          </select>
        </div>
      </form>
    </div>
    <div class="ps-checkout__right">
      <div class="ps-block--your-order">
        <div class="ps-block__header">
          <h3>Your order</h3>
        </div>
        <div class="ps-block__divider"></div>
        <div class="ps-block__detail">
          <h5>Products</h5>
          <p>Cum sociis natoque<span>$12.00</span></p>
          <p>Habitant morbi tristique<span>$12.00</span></p>
          <p>Aenean ultricies<span>$12.00</span></p>
          <div class="ps-block__divider"></div>
          <p>Subtotal<strong>$48.00</strong></p>
          <div class="ps-block__divider"></div>
          <p>Shipping<span>0</span></p>
          <div class="ps-block__divider"></div>
          <p class="total">Total<strong>$48.00</strong></p>
        </div>
        <div class="ps-block__payment-methond">
          <div class="ps-radio">
            <input class="form-control" type="radio" id="order-1" name="order"/>
            <label for="order-1">Direct bank transfer</label>
          </div>
          <div class="ps-radio">
            <input class="form-control" type="radio" id="order-2" name="order"/>
            <label for="order-2">Cheque Payment</label>
          </div>
          <div class="ps-radio">
            <input class="form-control" type="radio" id="order-3" name="order"/>
            <label for="order-3">Paypal <i class='fa fa-cc-mastercard'></i><i class='fa fa-cc-paypal'></i><i class='fa fa-cc-visa'></i><i class='fa fa-cc-discover'></i></label>
          </div>
        </div>
        <div class="ps-block__footer">
          <button class="ps-btn ps-btn--fullwidth">Place Order</button>
        </div>
      </div>
    </div>
  </div>
</div>
@stop