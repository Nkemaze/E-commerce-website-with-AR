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
          <h2 class="page-title">CART</h2>
          <div class="checkout-steps">
            <a href="{{ url('/cart') }}" class="checkout-steps__item active" style="flex: 4;">
              <span class="checkout-steps__item-number">01</span>
              <span class="checkout-steps_item-title">
                <span >Shopping Bag</span>
                <p class="sub-title">Manage Your Items List</p>
              </span>
            </a>
            <a href="#" class="checkout-steps__item" style="flex: 4;">
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
              <table class="cart-table">

                <thead>
                  <tr>
                    <th>Product</th>
                    <th></th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th></th>
                  </tr>
                </thead>    
    

                <tbody>
                  @foreach($cart as $key => $item)
                  <tr>
                      <td>
                          <div class="shopping-cart__product-item">
                              <img loading="lazy" src="{{ asset('storage/'.$item['image']) }}" width="150" height="150" alt="" />
                          </div>
                      </td>
                      <td>
                          <div class="shopping-cart__product-item__detail">
                              <h4>{{ $item['name'] }}</h4>
                              <ul class="shopping-cart__product-item__options">
                                  @if($item['size'])
                                  <li>Size: {{ $item['size'] }}</li>
                                  @endif
                              </ul>
                          </div>
                      </td>
                      <td>
                          {{ number_format($item['price'], 2) }}FCFA
                      </td>
                      <td>
                          <div class="quantity">
                              <button>-</button>
                              <input type="text" value="{{ $item['quantity'] }}">
                              <button>+</button>
                          </div>
                      </td>
                      <td class="total">
                          {{ number_format($item['price'] * $item['quantity'], 2) }}FCFA
                      </td>
                      <td>
                          <a href="{{ route('cart.remove', $key) }}" class="remove-cart">
                              <svg width="10" height="10" viewBox="0 0 10 10" fill="#767676" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M0.259435 8.85506L9.11449 0L10 0.885506L1.14494 9.74056L0.259435 8.85506Z" />
                                  <path d="M0.885506 0.0889838L9.74057 8.94404L8.85506 9.82955L0 0.97449L0.885506 0.0889838Z" />
                              </svg>
                          </a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
              </table>
    
              <!-- START COUPON AND UPDATE CART -->
    
              <div class="cart-table-footer">
                <div class="btn-class">
                  <button class="btn btn-light" ><a href="{{ url('/shop') }}">UPDATE CART</a></button>
                </div>
              </div>
    
              <!-- END COUPON AND UPDATE CART -->
    
            </div>
    
            <!-- START SECTION TOTAL -->
    
            <div class="shopping-cart__totals-wrapper">
              <div class="sticky-content">
                <div class="shopping-cart__totals">
                  <h3>Cart Totals</h3>
                  <table class="cart-totals">
                    <tbody>
                      <tr>
                        <th>Subtotal</th>
                        <td class="maintotal">
                            {{ number_format(array_reduce($cart, function($carry, $item) {
                                return $carry + ($item['price'] * $item['quantity']);
                            }, 0), 2) }}FCFA
                        </td>
                      </tr>
                      <tr>
                        <th>Shipping</th>
                        <td>
                          <div class="form-check">
                            <input class="form-check-input form-check-input_fill" type="checkbox" value=""
                              id="free_shipping">
                            <label class="form-check-label" for="free_shipping">Free shipping</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input form-check-input_fill" type="checkbox" value="" id="flat_rate">
                            <label class="form-check-label" for="flat_rate">Flat rate</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input form-check-input_fill" type="checkbox" value=""
                              id="local_pickup">
                            <label class="form-check-label" for="local_pickup">Local pickup</label>
                          </div>
                          <div>Shipping to AL.</div>
                          <div>
                            <a href="#" class="menu-link menu-link_us-s">CHANGE ADDRESS</a>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <th>Total</th>
                        <td>
                            {{ number_format(array_reduce($cart, function($carry, $item) {
                                return $carry + ($item['price'] * $item['quantity']);
                            }, 0), 2) }}FCFA
                        </td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="mobile_fixed-btn_wrapper">
                <div class="button-wrapper container">
                  <a href="{{ url('/cart2') }}" class="btn btn-primary btn-checkout">PROCEED TO CHECKOUT</a>
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
</body>
</html>