<a href="{{route('welcome')}}">
                            <img src="/images/img_trans.gif" alt="Market Lada Home Page" 
                            class="bg-marketlada_logo_mobile_view" width="1" height="1">
                            <img src="/images/img_trans.gif" alt="Market Lada Home Page" 
                            class="bg-marketlada_logo_desktop_view" width="1" height="1">
                        </a>
<form action="{{ url('/search') }}" method="POST" class="mobile-search-form" >
                        {{ csrf_field() }}
                            <input type="search" name="q" id="home-search"
                            placeholder="Try beans" class="mobile-search" required>
                            <input type="submit" value="Search" class="desktop-search-submit">
                        </form>