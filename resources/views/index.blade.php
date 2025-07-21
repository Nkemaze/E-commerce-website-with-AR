<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARILESHOPE</title>
    <link rel="stylesheet" href="{{ asset('assets/css/head.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome-free-6.5.2-web/css/all.min.css') }}">

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
                            <a href="{{ url('/about') }}" class="shope">Learn More</a>
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

        <section class="second">
            <div class="container-1">
                <p>Discover</p>
                <h1>Revolutionary AR Try-On <br> Technology at Your Fingertips</h1>
                <p>Experience the future of shopping with our augmented reality try-on feature. It allows you to <br> visualize products in real-time, ensuring a perfect fit every time.</p>
                
                <div class="features-1">
                    <div class="feature-1">
                        <img src="assets/images/augmented-reality-retail-1.webp" alt="Shopping with AR">
                        <h3>Transform Your Shopping Experience with AR</h3>
                        <p>Our technology bridges the gap between online and in-store shopping.</p>
                    </div>
                    <div class="feature-1">
                        <img src="assets/images/TRYO_2.png" alt="Try Before You Buy">
                        <h3>Try Before You Buy with Confidence</h3>
                        <p>Eliminate uncertainty and make informed purchasing decisions.</p>
                    </div>
                    <div class="feature-1">
                        <img src="assets/images/ar-augmented-reality-india.webp" alt="Seamless Integration">
                        <h3>Seamless Integration with Your Favorite Devices</h3>
                        <p>Our AR try-on works effortlessly across all platforms.</p>
                    </div>
                </div>
                
                <div class="buttons-1">
                    <a  href="{{ url('/about') }}"><button id="firstbtn" >Learn More</button></a>
                    <a  href="{{ url('/sign') }}"><button id="otherbtn">Sign Up →</button></a>
                </div>
            </div>
        </section>

        <section class="third">
            <div class="container-2">
                <h3>Try-On</h3>
                <h1>Experience Fashion Like Never Before</h1>
                <p>Our innovative AR try-on feature allows you to visualize how products look on you in real-time. <br>
                Simply select an item, and see it come to life through your device's camera.</p>
                
                <div class="features-2">
                    <div class="feature-2">
                        <div class="icon"><i class="fa-solid fa-cube"></i></div>
                        <h3>How Our AR Try-On Works</h3>
                        <p>With advanced technology, you can try before you buy.</p>
                    </div>
                    <div class="feature-2">
                        <div class="icon"><i class="fa-solid fa-cube"></i></div>
                        <h3>Seamless Integration with Your Device</h3>
                        <p>Our feature works effortlessly on smartphones and tablets.</p>
                    </div>
                    <div class="feature-2">
                        <div class="icon"><i class="fa-solid fa-cube"></i></div>
                        <h3>Realistic Visuals for Confident Choices</h3>
                        <p>Experience lifelike representations of products tailored to you.</p>
                    </div>
                </div>
                
                <div class="buttons-2">
                    <a href="{{ url('/about') }}"><button>Learn More</button></a>
                    <a href="{{ url('/sign') }}"><button>Sign Up →</button></a>
                </div>
            </div>
        </section>

        <section class="fourth">
            <div class="testimonial-container">
                <div id="myVideo" class="video-placeholder">
                    <video src="assets/images/Tech for a new way of shopping.mp4" type="video/mp4" controls></video>
                </div>
                <div class="testimonial-text">
                    <div class="stars">★★★★★</div>
                    <p><strong>"The AR try-on feature transformed my shopping experience! I was able to visualize how the products would look on me before making a purchase."</strong></p>
                </div>
            </div>
        </section>

        <section class="fifth">
            <div class="container-3">
                <div class="hero">
                    <div class="hero-text">
                        <h1>Discover Your Perfect Look</h1>
                        <p>Start shopping now and experience our innovative AR try-on feature for a personalized selection.</p>
                        <div class="buttons">
                            <button class="shop" onclick="window.location.href='{{ url('/shop') }}'">Shop</button>
                            <button class="try-on" onclick="window.location.href='{{ url('/sign') }}'">Try On</button>
                        </div>
                    </div>
                    <div class="hero-image">
                        <img src="assets/images/AR_clothing_configurator.webp" alt="AR Try-On Feature">
                    </div>
                </div>
                <div class="newsletter">
                    <h2>Stay Updated with Our Newsletter</h2>
                    <p>Subscribe now for the latest news, exclusive offers, and exciting updates from our store!</p>
                    <div class="newsletter-form">
                        <input type="email" placeholder="Your Email Here">
                        <a href="{{ url('/sign') }}"><button class="join-2">Join Us</button></a>
                    </div>
                    <p class="terms">By clicking Join Us, you agree to our Terms and Conditions.</p>
                </div>
            </div>
        </section>

        <section class="sixth">
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
    <script src=" {{ asset('assets/js/script.js') }} "></script>
    <script src=" {{ asset('assets/js/all.main.js') }}"></script>
    
</body>
</html>