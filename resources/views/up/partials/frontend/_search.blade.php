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
              @if(Auth::guest())
            <div id="login-shopping-cart">
                <a href="{{route('login')}}" class="login-button">Login</a>
                <div id="shopping-cart-contain">
                    <!-- <a href="{{route('user.cart.index')}}"><img src="./icons/shopping-cart.svg" alt="shopping cart" width="32px" height="22.08px" id="shopping-cart"></a> -->
                    <button onclick="openCart()"><img src="/icons/shopping-cart.svg" alt="shopping cart" width="32px" height="22.08px" id="shopping-cart"> </button>
                    <sup id="cart-value-contain"><span id="cart-value">0</span></sup>
                </div>
                <!-- <i class="fal fa-shopping-cart"></i> -->
            </div>

            @else
            <div id="login-shopping-cart">
            <img src="/images/uploads/avatars/{{ Auth::user()->avatar }}" style="width:32px; height:32px; position:relative;  border-radius:50%;">
              
            <div id="shopping-cart-contain">
                    <!-- <a href="{{route('user.cart.index')}}"><img src="./icons/shopping-cart.svg" alt="shopping cart" width="32px" height="22.08px" id="shopping-cart"></a> -->
                    <button onclick="openCart()"><img src="/icons/shopping-cart.svg" alt="shopping cart" width="32px" height="22.08px" id="shopping-cart"> </button>
                    <sup id="cart-value-contain"><span id="cart-value">{{count($carts)}}</span></sup>
            </div>
            </div>
            @endif
        </div>
        <div id="slide-cart" class="slide-cart">
            <a href="javascript:void(0)" class="closecart" onclick="closeCart()" id="closeCartId">&times;</a>
            <hr>
            <p class="cart-heading">Cart</p>
            <hr>
            <?php $count = 0 ?>
            @if(Auth::check())
            @foreach($carts as $cart)
            <div class="all-cart-items">
                <div>
                    <div>
                        <img src="/products/images/{{$cart->image}}" alt="{{$cart->name}}" class="cart-item">
                        <div class="item-description">
                            <p>{{$cart->name}}</p>
                            <p>N{{$cart->price}}</p>
                            <p>Total</p>
                        </div>
                    </div>
                    <div class="cart-actions">
                        <button>Remove</button>
                        
                        <p><button>&minus;</button> <span>1</span> <button>&plus;</button></p>
                        <p>N2500</p>
                    </div>
                </div>
            </div>
            <?php $count += $cart->price ?> 
            @endforeach
            <hr class="cart-amount-hr">
            <div class="cart-amount">
                <p>Amount</p>
                <p>N{{$count}}</p>
            </div>
            <form action = "{{route('user.cart.index')}}" method="get">
              @csrf
              <button type="button" class="cart-checkout" data-toggle="modal" data-target="#exampleModalCenter">
                checkout
            </button>
          </form>
            @else
            <div>No Item Found</div>
            @endif        
        </div>