<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{asset('gambar/logo.jpg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Suryani Catering</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('gambar/user.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            @if (Auth::check())
                @if (auth()->user()->role == "admin")
                <a href="{{route('user.edit',auth()->user()->id)}}" class="d-block">{{auth()->user()->nama}}</a>
                @elseif(auth()->user()->role == "user")
                <a href="{{route('edit.user',auth()->user()->id)}}" class="d-block">{{auth()->user()->nama}}</a>
                @endif
            @else
            Guest
            @endif
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
               @if (Auth::check() && auth()->user()->role=="admin")
               <a href="{{route('dashboard')}}" class="nav-link">
                <i class="fab fa-windows"></i>
                <p>
                    Dashboard
                </p>
            </a>
               </li>
              <li class="nav-item">
                <a href="{{route('user.index')}}" class="nav-link">
                    <i class="fas fa-users"></i>
                  <p>Data User</p>
                </a>
              </li>
            @endif
            @if (Auth::check() && (auth()->user()->role=="admin" || auth()->user()->role=="user"))
              <li class="nav-item">
                <a href="{{route('menu')}}" class="nav-link">
                    <i class="fas fa-hamburger"></i>
                  <p>Daftar Menu</p>
                </a>
              </li>
            @else
            <li class="nav-item">
                <a href="{{route('utama')}}" class="nav-link">
                    <i class="fas fa-hamburger"></i>
                  <p>Daftar Menu</p>
                </a>
              </li>
            @endif
            @if (Auth::check() && (auth()->user()->role=="admin" || auth()->user()->role=="user"))
              <li class="nav-item">
                <a href="{{route('menu_paket.index')}}" class="nav-link">
                    <i class="fas fa-utensils"></i>
                  <p>Daftar Menu Paket</p>
                </a>
              </li>
            @endif
            @if (Auth::check() && (auth()->user()->role=="admin" || auth()->user()->role=="user"))
              <li class="nav-item">
                <a href="{{route('pemesanan.index')}}" class="nav-link">
                    <i class="fas fa-shopping-bag"></i>
                  <p>Pemesanan</p>
                </a>
              </li>
            @endif
              @if (Auth::check() && auth()->user()->role=="admin")
                        <li class="nav-item">
                            <a href="{{route('laporan.index')}}" class="nav-link">
                                <i class="fas fa-book"></i>
                                <p> Laporan Pemesanan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('laporan.index2')}}" class="nav-link">
                                <i class="fas fa-book"></i>
                                <p> Laporan Customer Loyal</p>
                            </a>
                        </li>
              @endif
              @if (Auth::check() && (auth()->user()->role=="admin" || auth()->user()->role=="user"))
          <li class="nav-item " >
            <a href="{{route('logout')}}" class="nav-link">
                <i class="fas fa-sign-out-alt"></i>
              <p>
                 Logout
              </p>
            </a>
          </li>
        @endif
        </ul>
      </nav>

      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
