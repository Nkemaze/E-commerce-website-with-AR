<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARILESHOPE</title>
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/head.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.main.css') }}">

    <style>
    </style>
</head>
<body>

    @include('partials.header')
    <main>
        <section class="container-2">
            <div class="card__container swiper">
                <div class="title-6">
                    <h2>Category</h2>
                </div>
               <div class="card__content">
                  <div class="swiper-wrapper">
                     <article class="card__article swiper-slide">
                        <div class="slide-1">
                           <img src="assets/images/category_1.png" alt="image">
                        </div>
                        <div class="card-name">
                            <p>Women Top</p>
                        </div>
                     </article>
         
                     <article class="card__article swiper-slide">
                        <div class="slide-1">
                           <img src="assets/images/category_2.png" alt="image">
                        </div>
                        <div class="card-name">
                            <p>Women Troser</p>
                        </div>
                     </article>
         
                     <article class="card__article swiper-slide">
                        <div class="slide-1">
                           <img src="assets/images/category_3.png" alt="image">
                        </div>
                        <div class="card-name">
                            <p>Polover</p>
                        </div>
                     </article>
         
                     <article class="card__article swiper-slide">
                        <div class="slide-1">
                           <img src="assets/images/category_4.png" alt="image">
                        </div>
                        <div class="card-name">
                            <p>Men Jean</p>
                        </div>
                     </article>
   
                     <article class="card__article swiper-slide">
                        <div class="slide-1">
                           <img src="assets/images/category_5.png" alt="image">
                        </div>
                        <div class="card-name">
                            <p>Men Shirt</p>
                        </div>
                     </article>

                     <article class="card__article swiper-slide">
                        <div class="slide-1">
                           <img src="assets/images/category_6.png" alt="image">
                        </div>
                        <div class="card-name">
                            <p>Shoes</p>
                        </div>
                     </article>

                     <article class="card__article swiper-slide">
                        <div class="slide-1">
                           <img src="assets/images/category_7.png" alt="image">
                        </div>
                        <div class="card-name">
                            <p>Women Dresses</p>
                        </div>
                     </article>

                     <article class="card__article swiper-slide">
                        <div class="slide-1">
                           <img src="assets/images/category_8.png" alt="image">
                        </div>
                        <div class="card-name">
                            <p>Kids Top</p>
                        </div>
                     </article>
                  </div>
               </div>
   
               <!-- Navigation buttons -->
               <div class="swiper-button-next">
                  <i class="fas fa-chevron-right"></i>
               </div>
               
               <div class="swiper-button-prev">
                  <i class="fas fa-chevron-left"></i>
               </div>
            </div>
        </section>

        <hr>

        <section class="fifth">
            <h2>Featured Products</h2>
            <h5 style="text-align: center; margin-bottom: 20px; color:gray;">Click on a product, click on tro-on to visualise your cloth</h5>
            <div class="product-grid">
                @foreach($products as $product)
                <div class="product">

                    <a href="{{ route('products.show', $product->id) }}">
                        @if($product->image_path)
                            <img src="{{ asset('storage/'.$product->image_path) }}" alt="{{ $product->name }}">
                        @else
                            <img src="{{ asset('assets/images/placeholder.jpg') }}" alt="No image">
                        @endif
                    </a>
                    
                    <h3 style="margin-bottom: 30px;">{{ $product->name }}</h3>
                    <div class="des">
                        <h4>{{ number_format($product->price, 2) }}FCFA</h4>
                        <div class="star" style="font-size: 12px; color: rgb(243, 181,25);">
                            <i class="fas fa-star"></i>
                        </div>
                        <form action="{{ route('cart.add', $product->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" style="background: none; border: none; cursor: pointer;">
                                <i class="fa-solid fa-cart-shopping cart"></i>
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="link-3">
                <a href="#">Show More →</a>
            </div>
        </section>
    </main>

    @include('partials.footer')

    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}" ></script>
    <script src="{{ asset('assets/js/home.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/all.main.js') }}"></script>
</body>
</html>