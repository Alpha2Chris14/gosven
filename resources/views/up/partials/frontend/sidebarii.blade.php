<div class="aside-container">
                    <aside class="desktop-aside">
                        <p class="user-heading">user</p>
                        <hr>
                        <ul class="aside-ul">
                            <li class="aside-list"><a href="{{route('profile')}}" class="aside-link {{Route::is('profile') ? 'current-aside':''}}">profile</a></li>
                            <li class="aside-list"><a href="{{route('home')}}" class="aside-link {{Route::is('home') ? 'current-aside':''}}">Dashboard</a></li>
                            <li class="aside-list"><a href="{{route('product.index')}}" class="aside-link {{Route::is('product.index') ? 'current-aside':''}}">My Products</a></li>
                            <li class="aside-list"><a href="{{route('product.create')}}" class="aside-link {{Route::is('product.create') ? 'current-aside':''}}">Upload</a></li>
                            <li class="aside-list"><a href="{{route('user.order')}}" class="aside-link {{Route::is('user.order') ? 'current-aside':''}}">Online Orders</a></li>
                            <li class="aside-list"><a href="{{route('user.offlineorder')}}" class="aside-link {{Route::is('user.offlineorder') ? 'current-aside':''}}">Offline Orders</a></li>
                            <li class="aside-list"><a href="{{route('contact')}}" class="aside-link">contact us</a></li>
                            <li class="aside-list"><a href="{{ route('logout') }}" class="aside-link" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">sign out</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                        </form>
                        </ul>
                    </aside>
                    <img src="images/watermark.svg" alt="" class="water-mark">
                </div>