@if (Auth::check())

<header id="notloged">
    <div class="row">
    <nav>
        <ul class="sidebar">
            <li onclick=hideSidebar()><a href="{{ url('/home') }}"><svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" fill="#5f6368"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a></li>
            <li class="hideonmobile"><a href="{{ url('/home') }}">Home</a></li>
            <li class="hideonmobile"><a href="{{ url('/shop') }}">Shop Now</a></li>
            <li class="hideonmobile"><a href="{{ url('/about') }}">About</a></li>
            <li class="hideonmobile"><a href="{{ url('/contact') }}">Contact</a></li>
            <div class="icons-1">
                <li><a href="{{ url('/cart') }}" id="cartLink" ><i class="fa-solid fa-cart-shopping"></i></a></li>
                <li><a href="{{ url('/dashboard') }}" id="accountLink" ><i class="fa-regular fa-user"></i></a></li>
                <li><a href="#" id="searchLink" ><i class="fa-solid fa-magnifying-glass"></i></a></li>
            </div>
        </ul>
        <ul class="other">
            <li><a href="{{ url('/home') }}"><img src="/assets/images/logo.png" alt="ARILESHOPE_LOGO" class="logo"></a></li>
            <li class="hideonmobile"><a href="{{ url('/home') }}">Home</a></li>
            <li class="hideonmobile"><a href="{{ url('/shop') }}">Shop Now</a></li>
            <li class="hideonmobile"><a href="{{ url('/about') }}">About</a></li>
            <li class="hideonmobile"><a href="{{ url('/contact') }}">Contact</a></li>
            <div class="icons-1">
                <li><a href="{{ route('cart.index') }}" class="cart-icon"><i class="fa-solid fa-cart-shopping"></i>
                    @if(count(session('cart', [])) > 0)
                        <span class="cart-count">{{ count(session('cart', [])) }}</span>
                    @endif
                    </a>
                </li>
                <li><a href="{{ url('/dashboard') }}" id="accountLink" ><i class="fa-regular fa-user"></i></a></li>
                <li><a href="#" id="searchLink" ><i class="fa-solid fa-magnifying-glass"></i></a></li>
            </div>
            <li class="menu" onclick=showSidebar()><a href=""><svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" fill="#5f6368"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></a></li>
        </ul>          
    </nav>
</header>

@else

<header id="notloged">
    <div class="row">
    <nav>
        <ul class="sidebar">
            <li onclick=hideSidebar()><a href=""><svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" fill="#5f6368"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a></li>
            <li><a href="{{ url('/index') }}">Home</a></li>
            <li><a href="{{ url('/shop') }}">Shop Now</a></li>
            <li><a href="{{ url('/about') }}">About</a></li>
            <li><a href="{{ url('/contact') }}">Contact</a></li>
            <li id="link"><a class="join" href="{{ url('auth.login') }} ">Join Us</a></li>
        </ul>
        <ul class="other">
            <li><a href="{{ url('index') }}"><img src="{{ asset('assets/images/logo.png') }}" alt="ARILESHOPE_LOGO" class="logo"></a></li>
            <li class="hideonmobile"><a href="{{ url('/index') }}">Home</a></li>
            <li class="hideonmobile"><a href="{{ url('/shop') }}">Shop Now</a></li>
            <li class="hideonmobile"><a href="{{ url('/about') }}">About</a></li>
            <li class="hideonmobile"><a href="{{ url('/contact') }}">Contact</a></li>
            <li class="hideonmobile" id="link"><a class="join" id="loginLink" href="{{ url('login') }}">Join Us</a></li>
            <li class="menu" onclick=showSidebar()><a href=""><svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" fill="#5f6368"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></a></li>
        </ul>
    </nav>
</header>

@endif

