@extends('frontend.layouts.master')

@section('title',__('tr.Checkout'))

@section('content')

@section('breads')
<li><i class="fa fa-angle-double-right"></i></li>
<li><a href="#">@yield('title')</a></li>
@endsection

@section('stylesheet')
    <style>
 
.StripeElement {
  box-sizing: border-box;
  background: white;

  padding: 10px 12px;

  width: 100%;
  height: 45px;
  border: 1px solid #ddd;
  
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}

#card-errors{
    color: #fa755a;
}
    </style>
@endsection

@include('frontend.components.breadcrumb')

<section class="section-big-py-space bg-light">
    <div class="custom-container">
        <div class="checkout-page contact-page">
            <div class="checkout-form">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-title">
                                <h3>Billing Details</h3></div>
                            <div class="theme-form">
                                <form action="{{ route('cart_checkout_post') }}" method="post" id="payment-form">
                                    @csrf
                                <div class="row check-out ">

                                    <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                        <label>@lang('tr.Name')</label>
                                        <p style="width: 100%; padding: 0 22px; height: 45px; border: 1px solid #ddd;"></p>
                                    </div>
                                    
                                    <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                        <label>@lang('tr.Email')</label>
                                        <p style="width: 100%; padding: 0 22px; height: 45px; border: 1px solid #ddd;"></p>
                                    </div>

                                    <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                        <label>@lang('tr.Mobile')</label>
                                        <p style="width: 100%; padding: 0 22px; height: 45px; border: 1px solid #ddd;"></p>
                                    </div>
                                    
                                    <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                        <label class="field-label">@lang('tr.Address')</label>
                                        <input type="text" name="address" value="" placeholder="Street address" required>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                        <label class="field-label">@lang('tr.City')</label>
                                        <input type="text" name="city" value="" placeholder="" required>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <label class="field-label">@lang('tr.Country')</label>
                                        <input type="text" name="country" value="" placeholder="" required>
                                    </div>
                                    
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label for="">@lang('Credit Or Debit Card')</label>
                                        
                                            <div class="form-row">

                                              <br><br>
                                              <div id="card-element">
                                                <!-- A Stripe Element will be inserted here. -->
                                              </div>
                                          
                                              <!-- Used to display form errors. -->
                                              <div id="card-errors" role="alert"></div>
                                            </div>
                                            <br>
                                            <button class="btn-normal btn">@lang('tr.Submit Payment')</button>
                                          </form>
                                          
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-details theme-form  section-big-mt-space">
                                <div class="order-box">
                                    <div class="title-box">
                                        <div>@lang('tr.Order') <span>@lang('tr.Total')</span></div>
                                    </div>
                                    <ul class="qty">
                                        @foreach (Cart::content() as $item)
                                        <li>{{ $item->name }} × <strong style="color:#b22827;">{{ $item->qty }}</strong> ({{ $item->options[0] }}) <span>EGP {{ $item->price }}</span></li>
                                        @endforeach
                                    </ul>
                                    
                                    
                                    <ul class="total">
                                        <li>@lang('tr.Total') <span class="count">EGP {{ Cart::subtotal() }}</span></li>
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</section>

@include('frontend.components.contactbanner')

@endsection

@section('javascript')
<script src="https://js.stripe.com/v3/"></script>
<script>
    // Create a Stripe client.
var stripe = Stripe('pk_test_IxWUgoTiGn7VRUlL2mSr4ql300FaCJgyh7');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
</script>
@endsection