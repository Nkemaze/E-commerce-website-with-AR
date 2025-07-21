<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ARILESHOPE</title>
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/head.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome-free-6.5.2-web/css/all.min.css') }}">
    <style>
        tr{
          justify-content: space-between;
          padding-right: 0px;
          padding-left: 0px
        }
        tbody td{
          text-align: right;
          margin-bottom: -20px
        }
        .first-data td{
          color: gray;
        }
        .first-data td:first-child{
          text-align: left;
        }
        thead::after{
    content: '';
    position: absolute;
    bottom: 40px;
    left: 0;
    width: 100%;
    height: 1px;
    background-color: rgb(212, 212, 212);
}
.cart-table tbody tr::after{
    content: '';
    position: absolute;
    bottom: 30px;
    left: 0;
    width: 100%;
    height: 1px;
    background-color: rgb(212, 212, 212);
} 

tbody tr{
    position: relative;
}
    </style>
</head>
<body>
    
    @include('partials.header')

    <main class="container">
        <section class="shop-checkout container">
          <h2 class="page-title">Shipping and Checkout</h2>
          <div class="checkout-steps">
            <a href="{{ url('/cart') }}" class="checkout-steps__item active" style="flex: 4;">
              <span class="checkout-steps__item-number">01</span>
              <span class="checkout-steps_item-title">
                <span >Shopping Bag</span>
                <p class="sub-title">Manage Your Items List</p>
              </span>
            </a>
            <a href="{{ url('/cart2') }}" class="checkout-steps__item active" style="flex: 4;">
              <span class="checkout-steps__item-number">02</span>
              <span class="checkout-steps_item-title">
                <span>Shipping and Checkout</span>
                <p class="sub-title">Checkout Your Items List</p>
              </span>
            </a>
            <a href="#" class="checkout-steps__item" style="flex: 4;">
              <span class="checkout-steps__item-number">03</span>
              <span class="checkout-steps_item-title">
                <span>Confirmation</span>
                <p class="sub-title">Review And Submit Your Order</p>
              </span>
            </a>
          </div>
          
          <!-- START PRODUCT AND TOTAL SECTION -->
    
          <div class="shopping-cart">
            <div class="cart-table__wrapper">
              <h2 class="section-title">SHIPPING DETAILS</h2>

              <form id="shipping-form">
                <div class="first-row">
                    <input type="text" name="name" placeholder="Full Name" required>
                    <input type="text" name="phone" placeholder="Phone Number" required>
                </div>
                <div class="second-row">
                    <input type="text" name="pincode" placeholder="Pincode" required>
                    <input type="text" name="state" placeholder="State" required>
                    <input type="text" name="city" placeholder="Town / City" required>
                </div>
                <div class="first-row">
                    <input type="text" name="house_no" placeholder="House No" required>
                    <input type="text" name="road_name" placeholder="Road Name" required>
                </div>
                <div class="last-row">
                    <input type="text" name="quater" placeholder="Quater" required>
                </div>
            </form> 
            </div>
    
            <!-- START SECTION TOTAL -->
    
            <div class="shopping-cart__totals-wrapper">
              <div class="sticky-content" style="height: 50%">
                <div class="shopping-cart__totals">
                  <h3>Your Order</h3>
                  <!-- Replace the static order table with this dynamic version -->
<table class="cart-totals">
  <thead>
      <tr>
          <td>PRODUCT</td>
          <td>SUBTOTAL</td>
      </tr>
  </thead>
  <tbody>
      @foreach($cart as $item)
      <tr class="first-data">
          <td>{{ $item['name'] }} x {{ $item['quantity'] }}</td>
          <td>{{ number_format($item['price'] * $item['quantity'], 2) }}FCFA</td>
      </tr>
      @endforeach
      <tr>
          <th>Subtotal</th>
          <td class="maintotal">
              {{ number_format(array_reduce($cart, function($carry, $item) {
                  return $carry + ($item['price'] * $item['quantity']);
              }, 0), 2) }}FCFA
          </td>
      </tr>
      <tr>
          <th>Total</th>
          <td>
              {{ number_format(array_reduce($cart, function($carry, $item) {
                  return ($carry + ($item['price'] * $item['quantity']));
              }, 0), 2) }}FCFA
          </td>
      </tr>
  </tbody>
</table>
                </div>
              </div>
              <div class="sticky-content" style="height: 20%">
                <div class="shopping-cart__totals second">
                  <form action="{{ route('cart.place-order') }}" method="POST">
                    @csrf
                    <input type="radio" id="bank" name="payment" value="bank">
                    <label for="bank" style="padding: 30px;">Direct bank transfer</label><br><br>
                    
                    <input type="radio" id="mobile" name="payment" value="mobile">
                    <label for="mobile" style="padding: 30px;">Mobile Money transfer</label><br><br>
                    
                    <input type="radio" id="cod" name="payment" value="cod">
                    <label for="cod" style="padding: 30px;">Cash on Delivery</label><br><br>
                    
                    <input type="radio" id="paypal" name="payment" value="paypal">
                    <label for="paypal" style="padding: 30px;">Paypal</label>
                    
                    <!-- Add hidden fields for shipping info -->
                    <input type="hidden" name="name" value="{{ old('name') }}">
                    <input type="hidden" name="phone" value="{{ old('phone') }}">
                    <!-- Add other shipping fields as needed -->
                </form>
                </div>
              </div>
              <div class="mobile_fixed-btn_wrapper">
                <div class="button-wrapper container">
                  <a href="{{ url('/cart3') }}" type="submit" class="btn btn-primary btn-checkout">PLACE ORDER</a>
                </div>
              </div>
            </div>
  
    
            <!-- END SECTION TOTAL -->
    
          </div>
    
          <!-- START PRODUCT AND TOTAL SECTION -->
    
        </section>
    </main>


    @include('partials.footer')

    <script src=" {{ asset('assets/js/swiper-bundle.min.js') }} "></script>
    <script src=" {{ asset('assets/js/all.main.js') }}"></script>
    <script src=" {{ asset('assets/js/cart.js') }}"></script>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
    const shippingForm = document.getElementById('shipping-form');
    const paymentForm = document.querySelector('form[action="{{ route('cart.place-order') }}"]');
    
    // Copy shipping data to payment form before submission
    paymentForm.addEventListener('submit', function(e) {
        const shippingData = new FormData(shippingForm);
        for (let [key, value] of shippingData.entries()) {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = key;
            input.value = value;
            paymentForm.appendChild(input);
        }
    });
});
    </script>
</body>
</html>