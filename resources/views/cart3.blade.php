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
        .shopping-cart__totals-wrapper{
            text-align: center;
            justify-content: center;
            justify-items: center;
            justify-self: center;
        }
        .icons3 {
            font-size: 40px;
            margin-bottom: 20px;
        }
        table{
            width: 100%
        }
        table thead{
            margin-bottom: 90px;
            color: gray;
            line-height: 50px;
            
        }
        table thead tr, table tbody tr{
            justify-content: space-between;
        }

        table thead tr td:first-child{
            text-align: left
        }
        table tbody tr td:first-child{
            text-align: left
        }

        table thead tr td:last-child{
            text-align: right
        }
        table tbody tr td:last-child{
            text-align: right
        }
        .first-col{
            border: 3px dotted black;
        }
        .first-data td{
          color: gray;
        }
        .first-data td:first-child{
          text-align: left;
        }
    .empty-cart-message {
        text-align: center;
        padding: 50px;
        background: #f8f9fa;
        border-radius: 10px;
        margin: 50px auto;
        max-width: 600px;
    }
    .empty-cart-message h3 {
        color: #6356E5;
        margin-bottom: 20px;
    }
    .empty-cart-message p {
        margin-bottom: 30px;
        color: #666;
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
            <a href="{{ url('/cart2') }}" class="checkout-steps__item active" style="flex: 4;">
              <span class="checkout-steps__item-number">02</span>
              <span class="checkout-steps_item-title">
                <span>Shipping and Checkout</span>
                <p class="sub-title">Checkout Your Items List</p>
              </span>
            </a>
            <a href="{{ url('/cart3') }}" class="checkout-steps__item active" style="flex: 4;">
              <span class="checkout-steps__item-number">03</span>
              <span class="checkout-steps_item-title">
                <span>Confirmation</span>
                <p class="sub-title">Review And Submit Your Order</p>
              </span>
            </a>
          </div>


                

    
            <div class="shopping-cart__totals-wrapper" style="width: 70%">
              @if(empty($order['items']))
    <div class="empty-cart-message">
        <h3>No order found</h3>
        <p>It seems you haven't placed any order yet.</p>
        <a href="{{ url('/shop') }}" class="btn btn-primary">Continue Shopping</a>
    </div>
@else
                <h3 class="icons3"><i class="fa-solid fa-check"></i></h3>
                <div class="sticky-content first-col">
                  <table class="table-ok">
                      <thead>
                          <tr>
                              <td>Order Number</td>
                              <td>Date</td>
                              <td>Total</td>
                              <td>Payment Method</td>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td>{{ $order['order_number'] }}</td>
                              <td>{{ $order['date'] }}</td>
                              <td>{{ number_format($order['total'], 2) }}FCFA</td>
                              <td>
                                  @if($order['payment_method'] == 'bank')
                                      Direct Bank Transfer
                                  @elseif($order['payment_method'] == 'mobile')
                                      Mobile Money Transfer
                                  @elseif($order['payment_method'] == 'cod')
                                      Cash on Delivery
                                  @elseif($order['payment_method'] == 'paypal')
                                      PayPal
                                  @else
                                      {{ $order['payment_method'] }}
                                  @endif
                              </td>
                          </tr>
                      </tbody>
                  </table>
              </div>
              <div class="sticky-content">
                <div class="shopping-cart__totals">
                    <h3>Order Details</h3>
                    <table class="cart-totals">
                        <thead>
                            <tr>
                                <td>PRODUCT</td>
                                <td>SUBTOTAL</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order['items'] as $item)
                            <tr class="first-data">
                                <td>{{ $item['name'] }} x {{ $item['quantity'] }}</td>
                                <td>{{ number_format($item['price'] * $item['quantity'], 2) }}FCFA</td>
                            </tr>
                            @endforeach
                            <tr>
                                <th>Subtotal</th>
                                <td class="maintotal">{{ number_format($order['subtotal'], 2) }}FCFA</td>
                            </tr>
                            <tr>
                                <th>VAT (15%)</th>
                                <td>{{ number_format($order['vat'], 2) }}FCFA</td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <td>{{ number_format($order['total'], 2) }}FCFA</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="sticky-content" style="margin-top: 30px;">
              <div class="shopping-cart__totals">
                  <h3>Shipping Information</h3>
                  <table class="cart-totals">
                      <tbody>
                          <tr>
                              <th>Full Name</th>
                              <td>{{ $order['shipping_info']['name'] }}</td>
                          </tr>
                          <tr>
                              <th>Phone Number</th>
                              <td>{{ $order['shipping_info']['phone'] }}</td>
                          </tr>
                          <tr>
                              <th>Address</th>
                              <td>
                                  {{ $order['shipping_info']['house_no'] }}, 
                                  {{ $order['shipping_info']['road_name'] }},
                                  {{ $order['shipping_info']['quater'] }},
                                  {{ $order['shipping_info']['city'] }},
                                  {{ $order['shipping_info']['state'] }}
                              </td>
                          </tr>
                          <tr>
                              <th>Pincode</th>
                              <td>{{ $order['shipping_info']['pincode'] }}</td>
                          </tr>
                      </tbody>
                  </table>
              </div>
          </div>
          <div class="mobile_fixed-btn_wrapper" style="margin-top: 30px;">
            <div class="button-wrapper container">
                <a href="{{ url('/') }}" class="btn btn-primary">Continue Shopping</a>
            </div>
        </div>
        @endif
            </div>
        </section>
    </main>


    @include('partials.footer')

    <script src=" {{ asset('assets/js/swiper-bundle.min.js') }} "></script>
    <script src=" {{ asset('assets/js/all.main.js') }}"></script>
    <script src=" {{ asset('assets/js/cart.js') }}"></script>
</body>
</html>