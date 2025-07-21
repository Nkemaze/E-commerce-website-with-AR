<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARILESHOPE</title>
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/head.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome-free-6.5.2-web/css/all.min.css') }}">

    <style>
    </style>
</head>
<body>
    @include('partials.header')
    <main>
        <secction class="first">
            <div class="left">
                <div class="left-content">
                    <h1>Experience <br> Shopping like never <br> Before</h1>
                    <p>Welcome to our cutting-edge e-commerce platform where you <br> can try on products using augmented reality. Discover a new way <br> to shop that brings the fitting room to your home.</p>
                       <div class="link-2">
                        <div class="shope-btn">
                            <a href="{{ url('/shop') }}">Shop Now</a>
                       </div>
                        <div class="learnmore-btn">
                            <a href="{{ url('/shop') }}" class="shope">TRY-ON</a>
                        </div>
                       </div>
                </div>
            </div>
            <div class="slideshow-container">
                <div class="slide">
                    <div class="myslides fade">
                        <img src="assets/images/slide-1.webp" alt="try our AR" style="width: fit-content; height: 360px;">
                        <div class="text">
                            <h3>Try Before You Buy</h3>
                            <p>Revolutionizing your shopping experience with AR technology.</p>
                        </div>
                    </div>
                    <div class="myslides fade">
                        <img src="assets/images/slide-3.png" alt="try our AR" style="width: fit-content; height: 360px; ">
                        <div class="text">
                            <h3>Join Our Community</h3>
                            <p>Connect with fellow shoppers and share experiences.</p>
                        </div>
                        
                    </div>
                    <div class="myslides fade">
                        <img src="assets/images/slide-2.png" alt="try our AR" style="width: fit-content; height: 360px; margin-top: 0px;">
                        <div class="text">
                            <h3>Shop with Confidence</h3>
                            <p>Find your perfect fit every time.</p>
                        </div>
                    </div>
                    
                </div>
                <div class="change">
                    <div class="dot-main" style="text-align: center; margin-right: auto;">
                        <span class="dot" onclick="currentSlide(1)"></span>
                        <span class="dot" onclick="currentSlide(2)"></span>
                        <span class="dot" onclick="currentSlide(3)"></span>
                    </div>
                    <div class="arrow">
                        <a class="prev" onclick="plusSlides(-1)">&#8592;</a>
                        <a class="next" onclick="plusSlides(-1)">&#8594;</a>
                    </div>

                </div>
            </div>
            
        </secction>

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

        

        <section class="sixth">
            <hr>
            <div class="container-4">
                <div class="head-2">
                    <div class="header-2">
                        <h1>Get in Touch</h1>
                        <p>We're here to assist you with any questions or concerns you may have.</p>
                    </div>
                    <div class="contact-text">
                        <div class="contact-info">
                            <p><i class="fa fa-envelope"></i> <strong>Email:</strong> <br> <a href="mailto:support@relume.io">support@relume.io</a></p>
                            <p><i class="fa fa-phone"></i> <strong>Phone:</strong> <br> <a href="tel:+15551234567">+1 (555) 123-4567</a></p>
                            <p><i class="fa fa-location-dot"></i> <strong>Office:</strong> <br> <a href="">456 Example Ave, Sydney NSW 2000 AU</a></p>
                        </div>
                    </div>
                </div>
                <div class="contact-section">
                    <div class="contact-image">
                        <img src="assets/images/Get-in-Touch-NEW-1600-x-706.jpg" alt="Contact Us Image">
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('partials.footer')

    <script src=" {{ asset('assets/js/swiper-bundle.min.js') }} "></script>
    <script src=" {{ asset('assets/js/script.js') }} "></script>
    <script src=" {{ asset('assets/js/home.js') }}"></script>
    <script src=" {{ asset('assets/js/all.main.js') }}"></script>
</body>
</html>