<nav class="navbar" id="navbar">
    <button id="menu-button"><i class="fas fa-bars"></i></button>
    <button id="account-button"><i class="fas fa-user"></i></button>
    <div class="dropdown" id="account-dropdown">
        <button><span style="cursor: default">Halo, {{ Auth::user()->nama }}</span></button>
        <hr style="border: none; height: 1px; background-color: #333; width: 85%; margin: 2px auto;">
        <button id="shop-button" onclick="window.location.href='{{ route('home.index') }}'">Shop</button>
        <button id="logout-button" onclick="window.location.href='{{ route('api.auth.logout') }}'; return false;">Logout</button>
    </div>
</nav>

<div id="sidebar" class="sidebar">
    <div class="logo">
        <img src="/img/icon_m.png" alt="">
    </div>
    <a href="{{ route('kelola.dashboard.index')}}" class="{{ Request::is('dashboard*') ? 'active' : '' }}">
        <i class="fas fa-tachometer-alt"></i><span> Dashboard</span>
    </a>
    <a href="{{ route('kelola.products.index') }}" class="{{ Request::is('kelola/produk*') ? 'active' : '' }}">
        <i class="fas fa-box"></i><span> Produk</span>
    </a>
    <a href="{{ route('kelola.user.index') }}" class="{{ Request::is('kelola/user*') ? 'active' : '' }}">
        <i class="fas fa-user-alt"></i><span> User</span>
    </a>
    <a href="{{ route('kelola.inventaris.index') }}" class="{{ Request::is('kelola/inventaris*') ? 'active' : '' }}">
        <i class="fas fa-archive"></i><span> Barang Inventaris</span>
    </a>    
</div>