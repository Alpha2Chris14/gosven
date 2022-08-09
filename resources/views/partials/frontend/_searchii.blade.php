<?php $total = 0 ?>
                        @foreach((array) session('cart') as $id => $details)
                            <?php $total += $details['price'] * $details['quantity'] ?>
                        @endforeach
<div class="top-search-login">
            <!-- <form class="form-inline" action="/action_page.php">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-search search-icon"></i>
                    </span>
                  </div>
                  <input type="search" id="search-input" class="form-control" placeholder="">
                </div>
                <button class="btn search-text" id="btn-submit" type="submit">Search</button>
              </form> -->
              
              <form action="{{ url('/search') }}" method="POST">
              {{ csrf_field() }}
                <div class="input-group desktop-input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-search search-icon"></i>
                    </span>
                  </div>
                  <input type="search" id="search-input" class="form-control" name="q" placeholder="Search..">
                  <div class="input-group-append">
                    <button class=" search-text" id="btn-submit" type="submit">Search</button>
                  </div>
                </div>
              </form>
              <div id="login-shopping-cart">
              @if(Auth::guest())
            
                <a href="{{route('login')}}" class="login-button">Login</a>

            @else
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" style="margin-right: 2rem;" role="button" data-toggle="dropdown" aria-haspopup="true"  aria-expanded="false" v-pre>
            <img src="/images/uploads/avatars/{{ Auth::user()->avatar }}" style="width:35px; height:35px; position:relative;  border-radius:50%;">
            </a>
            <div class="dropdown-menu dropdown-menu-right dashboard-hp " aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item home-options" href="{{ route('home') }}">
                                        <h4>{{ __('Dashboard') }}</h4>
                                    </a>
                                    <a class="dropdown-item home-options" href="{{ route('profile') }}">
                                    <h4>{{ __('Profile') }}</h4>
                                    </a>
                                    <a class="dropdown-item home-options" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <h4>{{ __('Logout') }}</h4>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
            @endif
            <div id="shopping-cart-contain">
                    <!-- <a href="{{route('user.cart.index')}}"><img src="./icons/shopping-cart.svg" alt="shopping cart" width="32px" height="22.08px" id="shopping-cart"></a> -->
                    <button onclick="document.location='{{route('cart')}}'"><i class="fas fa-cart-arrow-down cart-icon"></i></button>
                    <sup id="cart-value-contain"><span id="cart-value">{{ count((array) session('cart')) }}</span></sup>
            </div>
            </div>
        </div>
        

        