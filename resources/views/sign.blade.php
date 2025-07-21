<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARILESHOPE</title>
    <link rel="stylesheet" href="{{ asset('assets/css/head.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/join.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome-free-6.5.2-web/css/all.min.css') }}">
</head>
<body>
    @include('partials.header')

    <main>
        <div class="container" id="container">
            <div class="form-container sign-up">
                <form id="register-form">
                    <h1>Create Account</h1>
                    <div class="social-icons">
                        <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                    </div>
                    <span>or use your email for registeration</span>
                    <div class="input-control">
                        <input type="text" placeholder="Name" id="username">
                        <div class="error"></div>
                    </div>
                    <div class="input-control">
                        <input type="email" placeholder="Email" id="reg-email">
                        <div class="error"></div>
                    </div>
                    <div class="input-control">
                        <input type="password" placeholder="Password" id="reg-password">
                        <div class="error"></div>
                    </div>  
                    <button type="submit">Sign Up</button>
                </form>
            </div>
            <div class="form-container sign-in">
                <form id="login-form">
                    <h1>Sign In</h1>
                    <div class="social-icons">
                        <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                    </div>
                    <span>or use your email password</span>
                    <div class="input-control">
                        <input type="email" placeholder="Email" id="email">
                        <div class="error"></div>
                    </div>
                    <div class="input-control">
                        <input type="password" placeholder="Password" id="password">
                        <div class="error"></div>
                    </div>
                    <a href="#">Forget Your Password?</a>
                    <button type="submit"><a href="home.html">Sign In</a></button>
                </form>
            </div>
            <div class="toggle-container">
                <div class="toggle">
                    <div class="toggle-panel toggle-left">
                        <h1>Welcome Back!</h1>
                        <p>Enter your personal details to use all of site features</p>
                        <button class="hidden-1" id="login">Sign In</button>
                    </div>
                    <div class="toggle-panel toggle-right">
                        <h1>Hello, Friend!</h1>
                        <p>Register with your personal details to use all of site features</p>
                        <button class="hidden-1" id="register" >Sign Up</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('partials.footer')

    <script src=" {{ asset('assets/js/join.js') }} "></script>
    <script src=" {{ asset('assets/js/all.main.js') }}"></script>
    <!-- <script src="assets/js/login.js"></script>
    <script src="assets/js/signup.js"></script> -->
</body>
</html> 