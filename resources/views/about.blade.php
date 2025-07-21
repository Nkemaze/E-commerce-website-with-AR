<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARILESHOPE</title>
    <link rel="stylesheet" href="{{ asset('assets/css/head.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/about.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome-free-6.5.2-web/css/all.min.css') }}">
</head>
<body>
  @include('partials.header')
    <main>
        <section class="about-us">
          <div class="title-container">
            <h2>ABOUT US</h2>
          </div>
    
          <div class="container">
            <div class="image">
                <img src="assets/images/about-1.jpg"alt="" />
            </div>

            <div class="story">
              <h3 class="tile-2">OUR STORY</h3>
              <p>In a world where online shopping often feels like a guessing game, we set out to change 
                the experience. Our journey began with a simple idea: What if customers could try on 
                products virtually before making a purchase? With that vision in mind, 
                we built an innovative e-commerce platform that bridges the gap between 
                online and in-store shopping. Through cutting-edge augmented reality (AR) 
                technology, we empower users to visualize products in real-time, ensuring 
                confidence in every purchase.

              </p>
              <p>With a passion for technology and innovation, we created a platform that brings the best 
                of both worlds together. By integrating state-of-the-art augmented reality (AR) technology, 
                we empower shoppers to try on products virtually in real-time, eliminating guesswork and 
                boosting confidence. Whether it’s clothing, accessories, eyewear, or home décor, our platform 
                allows customers to see how items look and fit before they buy. Our journey is fueled by a 
                commitment to making online shopping smarter, more interactive, and, most importantly, 
                enjoyable
                </p>
              <div class="row-2">
                <div class="col-6">
                  <h5 class="tile-3">Our Mission</h5>
                  <p >To revolutionize online shopping with augmented reality, allowing customers to try before they buy, shop with confidence, and enjoy a seamless, interactive experience</p>
                </div>
                <div class="col-6 second-3">
                  <h5 class="title-4">Our Vision</h5>
                  <p >To create a future where online shopping feels as real as in-store experiences, making it more immersive, accessible, and hassle-free through cutting-edge AR technology</p>
                </div>
              </div>
            </div>  
            <div class="last">
              <div class="image-2">
                <img  src="assets/images/about-1.jpg" width="450" height="500" alt="">
              </div>
              <div class="company">
                <h5 class="title-5">The Company</h5>
                <p>We are a tech-driven e-commerce platform redefining online shopping with augmented reality. 
                    Our AR try-on feature lets customers visualize products in real-time, 
                    ensuring a confident and hassle-free shopping experience. 
                    With a team of innovators and retail experts, 
                    we are committed to blending technology with convenience, 
                    making online shopping smarter, more interactive, and more reliable.
                </p>
              </div>
            </div>
          </div>
        </section>
    </main>

    @include('partials.footer')
    <script src=" {{ asset('assets/js/all.main.js') }}"></script>
</body>
</html>