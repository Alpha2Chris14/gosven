<nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color:black;">
        <ul class="nav">
          <li class="nav-item {{(Request::is('admin'))?'active':''}}">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
              <i class="ti-shield menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          @if(Auth::guard('admin')->user()['id'] == 1)
          
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#upload" aria-expanded="{{(Request::is('admin/products/index')) ? 'true' : 'false'}}" aria-controls="upload">
              <i class="ti-cloud-up menu-icon"></i>
              <span class="menu-title">Upload Goods</span>
              <i class="menu-arrow"></i>
            </a>

            <div class="collapse {{(Request::is('admin/products/index')) ? 'show' : ''}}" id="upload">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item {{(Request::is('admin/products/index')) ? 'active' : ''}}"> <a class="nav-link" href="{{ route('products.index') }}"> All Product </a></li>
                <li class="nav-item {{(Request::is('admin/products/create')) ? 'active' : ''}}"> <a class="nav-link" href="{{ route('products.create') }}"> Create New Product </a></li>
              </ul>
            </div>
          </li>

          @endif
        
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#incoming" aria-expanded="false" aria-controls="incoming">
              <i class="ti-view-list-alt menu-icon"></i>
              <span class="menu-title">Incoming Orders</span>
            </a>

            <div class="collapse" id="incoming">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item {{(Request::is('online')) ? 'active' : ''}}"> <a class="nav-link" href="{{route('admin.online')}}"> Online Payment </a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item {{(Request::is('admin/delivery')) ? 'active' : ''}}">
            <a class="nav-link"  href="{{route('admin.delivery')}}">
              <i class="ti-truck menu-icon"></i>
              <span class="menu-title">Delivery Management</span>
            </a>
          </li>
          @if(Auth::guard('admin')->user()['id'] == 1)
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#web" aria-expanded="false" aria-controls="web">
              <i class="ti-world menu-icon"></i>
              <span class="menu-title">Web Management</span>
              <i class="menu-arrow"></i>
            </a>

            
            <div class="collapse" id="web">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item {{(Request::is('admin/about')) ? 'active' : ''}}"> <a class="nav-link" href="{{route('about.index')}}"> About Us </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('faq.index') }}"> Faq</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('category.index') }}"> Category</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('unit.index') }}"> Unit</a></li>
              </ul>
            </div>
          </li>
          @endif

          @if(Auth::guard('admin')->user()['id'] == 1)
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="ti-user menu-icon"></i>
              <span class="menu-title">User Management</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('user.index') }}"> All Users </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('approved.index') }}"> Approved Users </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('declined.index') }}"> Pending Request</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('roles') }}"> Roles</a></li>
              </ul>
            </div>
          </li>

          @endif
          
          <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                <i class="ti-power-off menu-icon"></i>
                <span class="menu-title">Sign Out</span>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
              </form>
          </li>
        </ul>
      </nav>