@if(Auth::user()->status >= 2)
    <nav class="side-nav">
                <p class="side-nav-header">Menu</p>
                <hr class="side-nav-hr">
                <ul class="navbar-nav side-nav-ul">
                    <li class="nav-item active"><a href="{{route('home')}}" class="nav-link side-nav-link">Dashboard</a></li>
                    <!-- <li class="nav-item"><a href="" class="nav-link side-nav-link">Notification<i style="width:20px;height:5px;background-color:red; border-radius:100%;margin-left:4px;color:white;padding:2px;">{{Auth::user()->unreadNotifications->count()}}</i></a></li> -->
                    <li class="nav-item"><a href="{{route('product.create')}}" class="nav-link side-nav-link">Upload</a></li>
                    <li class="nav-item"><a href="{{route('product.index')}}" class="nav-link side-nav-link">My Products</a></li>
                    <li class="nav-item"><a href="{{route('user.order')}}" class="nav-link side-nav-link">Online Orders</a></li>
                    <li class="nav-item"><a href="{{route('user.offlineorder')}}" class="nav-link side-nav-link">Offline Orders</a></li>
                    <hr class="side-nav-hr">
                    <li class="nav-item"><a href="{{route('contact')}}" class="nav-link side-nav-link">Contact us</a></li>

                    <li class="nav-item">
                        <a class="nav-link side-nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Sign Out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                        </form>
                    </li>
                </ul>
            </nav>
@endif