@if(!Auth::check())
    <nav class="mobile-nav">
                        <ul class="mobile-nav-container desktop-nav-container">
                            <hr>
                            <div class="desktop-top-nav">
                                <li class="nav-item"><a href="{{route('welcome')}}" class="nav-link {{(Route::is('welcome')) ? 'current' : ''}}">Home</a></li>
                                <div class="shop-now-dropdown">
                                    <li class="nav-item" id="shop-now-link"><a href="{{route('product',1)}}" class="nav-link  {{(Route::is('product',1)) ? 'current' : ''}}">Shop Now</a></li>
                                    <button id="shop-collapsible" class="bottom"></button>
                                </div>
                                <div id="mobile-shop-dropdown">
                                    <ul class="dropdown-ul">
                                    @foreach($categories as $cat)
                                        <li><a href="{{route('product',$cat->id)}}">{{$cat->name}}</a></li>
                                    @endforeach
                                    </ul>
                                </div>
                                <li class="nav-item"><a href="{{route('about')}}" class="nav-link {{(Route::is('about')) ? 'current' : ''}}">About</a></li>
                                <li class="nav-item"><a href="" class="nav-link">Services</a></li>
                                <li class="nav-item desktop-login-link"><a href="#" class="nav-link">Contact Us</a></li>
                                <li class="nav-item desktop-login-link"><a href="{{route('login')}}" class="nav-link {{(Route::is('login')) ? 'current' : ''}}">Login</a></li>
                            </div>
                            <div class="desktop-login-cart-container">
                                <div class="cart-value-container">
                                    <a href="{{route('cart')}}">
                                        <img src="/images/img_trans.gif" alt="cart" width="1" height="1"
                                        class="bg-cart_desktop">
                                        <span class="cart-value">{{count($carts)}}</span>
                                    </a>
                                </div>
                            </div>
                        </ul>
                        <div class="hamburger">
                            <span class="bar"></span>
                            <span class="bar"></span>
                            <span class="bar"></span>
                        </div>
                    </nav>

@else
<nav class="mobile-nav">
                        <ul class="mobile-nav-container desktop-nav-container">
                            <hr>
                            <div class="desktop-top-nav">
                                <li class="nav-item"><a href="{{route('welcome')}}" class="nav-link {{(Route::is('welcome')) ? 'current' : ''}}">Home</a></li>
                                <div class="shop-now-dropdown">
                                    <li class="nav-item" id="shop-now-link"><a href="{{route('product',1)}}" class="nav-link  {{(Route::is('product',1)) ? 'current' : ''}}">Shop Now</a></li>
                                    <button id="shop-collapsible" class="bottom"></button>
                                </div>
                                <div id="mobile-shop-dropdown">
                                    <ul class="dropdown-ul">
                                    @foreach($categories as $cat)
                                        <li><a href="{{route('product',$cat->id)}}">{{$cat->name}}</a></li>
                                    @endforeach
                                    </ul>
                                </div>
                                <li class="nav-item"><a href="{{route('about')}}" class="nav-link {{(Route::is('about')) ? 'current' : ''}}">About</a></li>
                                <li class="nav-item"><a href="" class="nav-link">Services</a></li>
                                <div class="user-dropdown">
                                    <li class="nav-item" id="shop-now-link"><a href="product.html" class="nav-link">User</a></li>
                                    <button id="user-collapsible" class="bottom"></button>
                                </div>
                                <div id="mobile-user-dropdown">
                                    <ul class="dropdown-ul">
                                        <li><a href="profile.html">Profile</a></li>
                                        <li><a href="dashboard.html">Dashboard</a></li>
                                        <li><a href="verify.html">Verify</a></li>
                                        <li><a href="">Sign out</a></li>
                                    </ul>
                                </div>
                                <li class="nav-item desktop-login-link"><a href="contact.html" class="nav-link">Contact Us</a></li>
                            </div>
                            <div class="desktop-login-cart-container">
                                <div class="user-container">
                                    <img src="/images/user.svg" alt="user" class="user-img">
                                    <button class="user-collapsible arrow-down"></button>
                                </div>
                                <div class="drop-down__menu-box">
                                    <ul class="drop-down__menu">
                                        <li class="drop-down__item"><a href="{{route('profile')}}">Profile</a></li>
                                        <li class="drop-down__item"><a href="{{route('logout')}}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Sign Out</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                        </form>
                                    </ul>
                                </div>
                                <div class="cart-value-container">
                                    <a href="{{route('cart')}}">
                                        <img src="/images/img_trans.gif" alt="cart" width="1" height="1"
                                        class="bg-cart_desktop">
                                        <span class="cart-value">{{count($carts)}}</span>
                                    </a>
                                </div>
                            </div>
                        </ul>
                        <div class="hamburger">
                            <span class="bar"></span>
                            <span class="bar"></span>
                            <span class="bar"></span>
                        </div>
                    </nav>                  
@endif