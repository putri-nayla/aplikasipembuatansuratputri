<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">pembuatan surat</span>
    </a>

    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ auth()->user()->role == 'admin' ? route('admin.dashboard') : route('siswa.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ route('admin.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-shield"></i>
                        <p>Manajemen Admin</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('penerima.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>penerima</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('laporan.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>laporan</p>
</a>
</li>
                <li class="nav-item">
                    <a href="{{ route('surat.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>surat</p>
</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('kategori.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>kategori</p>
</li>
            </ul>

        </nav>
    </div>
</aside>