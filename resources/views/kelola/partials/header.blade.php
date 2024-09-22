<nav id="sidebar">
    <div class="sidebar-header">
        <h3>SND Bandung</h3>
    </div>
    <ul class="list-unstyled components">
        <li class="active">
            <a href="{{ route('kelola.products.index') }}">
                <i class="fas fa-box"></i>
                <span class="d-none d-md-inline">Produk</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fas fa-list"></i>
                <span class="d-none d-md-inline">User</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fas fa-chart-line"></i>
                <span class="d-none d-md-inline">Data Inventaris</span>
            </a>
        </li>
    </ul>
</nav>

<nav class="navbar">
    <button class="btn btn-info" id="sidebarToggle">
        <i class="fas fa-bars"></i>
    </button>
    
    <div class="ml-auto">
        <button class="btn btn-secondary" id="accountMenu">
            <i class="fas fa-user"></i>
        </button>
    </div>
</nav>