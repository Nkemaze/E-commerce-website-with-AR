<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARILESHOPE</title>
    <link rel="stylesheet" href="{{ asset('assets/css/head.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome-free-6.5.2-web/css/all.min.css') }}">
</head>
<body>
    @include('partials.header')

    <main>
        <section class="contact-us">
            <div class="title-container">
                <p>CONTACT US</p>
            </div>
            <div class="container">
                <div class="contact-form">
                    <form>
                        <div class="form-group">
                            <input type="text" id="name" name="name" class="form-control" placeholder="">
                            <label for="name" class="form-label">Full Name</label>
                        </div>
                        <div class="form-group">
                            <input type="email" id="email" name="email" class="form-control" placeholder="">
                            <label for="email" class="form-label">Email Address</label>
                        </div> 
                        <div class="form-group">
                            <input type="number" id="tel" name="telephone" class="form-control" placeholder="">
                            <label for="password" class="form-label">Phone Number</label>
                        </div>
                        <div class="form-group">
                            <textarea id="message" name="message" class="form-control" placeholder=""></textarea>
                            <label for="password" class="form-label">Message</label>
                        </div>
                        <button type="submit">Send Message</button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    @include('partials.footer')
    <script src=" {{ asset('assets/js/all.main.js') }}"></script>
</body>
</html>