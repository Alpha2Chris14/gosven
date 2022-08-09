<nav class="navbar p-0 container-fluid">
                <div id="mobile-top-nav" class="container-fluid">
                <div>
                    <div id="mshopping-cart-contain">
                        <button onclick="document.location='{{route('register')}}'" id="cart"><i class="fas fa-cart-arrow-down cart-icon"></i></button>
                        <sup id="mcart-value-contain"><span id="mcart-value">{{count($carts)}}</span></sup>
                    </div>
                        <!-- <i class="fal fa-shopping-cart"></i> -->

                    <div class="navbar-brand" id="navbar-brand">
                        <img src="{{url('./icons/symbol.svg')}}" alt="Govera's symbol" class="mgsv-symbol"> 
                        <p id="mgsv"><a href="{{route('welcome')}}">Govera Steadfast Ventures</a></p>
                        
                    </div>

                    <!-- Toggler/collapsibe Button -->
                    <div id="mySidepanel" class="sidepanel">
                        <a href="javascript:void(0)" class="closebtn" id="closeNavId" onclick="closeNav()">&times;</a>
                        <hr class="nav-panel-hr"/>
                        <ul class="navbar-nav" id = "mobile-nav-ul">
                            <li class="nav-item active"><a href="{{route('welcome')}}" class="nav-link">Home</a></li>
                            <li class="nav-item"><a href="{{route('about')}}" class="nav-link">About</a></li>
                            <li class="nav-item"><a href="" class="nav-link">Services</a></li>
                            <li class="nav-item"><a href="{{route('contact')}}" class="nav-link">Contact Us</a></li>
                            <hr class="nav-panel-hr"/>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#incoming" aria-expanded="false" aria-controls="incoming">
                                    <span class="menu-title">Shop Now</span>
                                    <i class="menu-arrow"></i>
                                </a>

                                <div class="collapse" id="incoming">
                                    <ul class="nav flex-column sub-menu">
                                    @foreach($categories as $cat)
                                        <li class="nav-item"> <a class="nav-link" href="{{route('product',$cat->id)}}"> {{$cat->name}} </a></li>
                                    @endforeach
                                    </ul>
                                </div>
                            </li>
                            <!-- <hr class="nav-panel-hr"/>
                            <div id="caret-dropdown">
                                <li class="nav-item"><a href="product/1" class="nav-link">Shop now</a></li>
                                <a href="#menu-items" class="nav-link" data-toggle="collapse" id="caret-symbol" role="button">&#94;<a>
                            </div>
                            <ul class="navbar-nav collapse" id="menu-items" aria-expanded="false">
                            @foreach($categories as $cat)
                                <li class="nav-item"><a href="{{route('product',$cat->id)}}" class="nav-link">{{$cat->name}}</a></li>
                                <li><a href="">shop</a></li>
                                <li><a href="">shop</a></li>
                            @endforeach
                            </ul> -->
                            <hr class="nav-panel-hr"/>
                            @if(!Auth::check())
                            <li class="nav-item"><a href="{{route('login')}}" class="nav-link">Login</a></li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#incom" aria-expanded="false" aria-controls="incoming">
                                    <span class="menu-title">Navigator</span>
                                    <i class="menu-arrow"></i>
                                </a>

                                <div class="collapse" id="incom">
                                    <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a href="{{route('home')}}" class="nav-link">Dashboard</a></li>
                                <li class="nav-item"><a href="{{route('profile')}}" class="nav-link">Profile</a></li>
                                <li class="nav-item"><a href="" class="nav-link">Notification</a></li>
                                <li class="nav-item"><a href="{{route('product.create')}}" class="nav-link">Upload</a></li>

                                </ul>
                                </div>
                            </li>
                            <hr class="nav-panel-hr"/>

                                <li class="nav-item"><a href="{{route('logout')}}" class="nav-link" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Log Out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                        </form>
                            </li>
                            @endif
                            
                        </ul>

                      
                            <!-- <div class="accordion md-accordion" id="accordionEx" role="tablist" >
                            <div>
                                <li class="nav-item"><a href="product/1" class="nav-link">Shop now</a></li>
                                <a href="#collapseOne1" data-toggle="collapse" data-parent="#accordionEx" aria-expanded="true" aria-controls="collapseOne1">
                                    <i class="fas fa-angle-down rotate-icon"></i>
                                </a>
                            </div>
                            <ul  id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1" data-parent="#accordionEx" >
                                <li class="nav-item"><a href="" class="nav-link">Raw Foods</a></li>
                                <li class="nav-item"><a href="" class="nav-link">Animal Products</a></li>
                                <li class="nav-item"><a href="" class="nav-link">Plant products</a></li>
                                <li class="nav-item"><a href="" class="nav-link">Condiments</a></li>
                                <li class="nav-item"><a href="" class="nav-link">Vegetables</a></li>
                                <li class="nav-item"><a href="" class="nav-link">Livestock</a></li>
                                <li class="nav-item"><a href="" class="nav-link">Sea Foods</a></li>
                                <li class="nav-item"><a href="" class="nav-link">Farm Tools/Aid</a></li>
                                <li class="nav-item"><a href="" class="nav-link">Kitchen Utensils</a></li>
                                <li class="nav-item"><a href="" class="nav-link">Bulk Purchase</a></li>
                                <li class="nav-item"><a href="" class="nav-link">Processed Foods</a></li>
                            </ul>
                            <hr class="nav-panel-hr"/>
                            <li class="nav-item"><a href="" class="nav-link">Contact us</a></li> -->
                    </div>
                      <button class="openbtn" id="btn" onclick="openNav();"><img src="/images/menuicon.svg" alt="menu icon" width="34" height="34"></button> <!--&#9776;-->
                </div>
                      <form action="{{url('search')}}" id="m-search-form">
                        <div class="input-group" id="m-input-group">
                            <div class="input-group-prepend" id="search-input-group">
                                <span class="input-group-text" id="input-group-text">
                                    <i class="fas fa-search search-icon"></i>
                                </span>
                            </div>
                            <input type="search" id="mobile-search-input" class="form-control" name="q" placeholder="SEARCH FOR PRODUCTS HERE">
                        </div>
                    </form>
                    
                </div>
                <div class="navbar-brand" id="desktop-nav-brand">
                    <img src="{{url('./icons/symbol.svg')}}" alt="Govera's symbol" class="gsv-symbol"> 
                    <p class="gsv">Govera Steadfast Ventures</p>
                </div>
                <ul class="navbar-nav" id = "top-nav-ul">
                    <li class="nav-item active"><a href="{{route('welcome')}}" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="{{route('product',1)}}" class="nav-link">Shop now</a></li>
                    <li class="nav-item"><a href="{{route('about')}}" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="" class="nav-link">Services</a></li>
                </ul>
        </nav>