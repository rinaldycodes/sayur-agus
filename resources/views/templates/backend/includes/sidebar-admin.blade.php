<ul
    class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion"
    id="accordionSidebar"
>
    <!-- Sidebar - Brand -->
    <a
        class="sidebar-brand d-flex align-items-center justify-content-center"
        href="{{ url('/') }}"
    >
        <div class="sidebar-brand-icon rotate-n-15">
            <!-- IMAGE logo -->
        </div>
        <div class="sidebar-brand-text mx-3">{{ config("app.name") }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0" />

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('/admin') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a
        >
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider" />

    <!-- Heading -->
    <div class="sidebar-heading">Interface</div>

    <!-- Nav Item - Product Collapse Menu -->
    <li class="nav-item">
        <a
            class="nav-link collapsed"
            href="#"
            data-toggle="collapse"
            data-target="#collapseProfile"
            aria-expanded="true"
            aria-controls="collapseProfile"
        >
            <i class="fas fa-fw fa-user"></i>
            <span>Profile</span>
        </a>
        <div
            id="collapseProfile"
            class="collapse"
            aria-labelledby="headingTwo"
            data-parent="#accordionSidebar"
        >
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('profile.index') }}"
                    >Profile</a
                >
                <a
                    class="collapse-item"
                    href="{{ url('/profile/change-password') }}"
                    >Change Password</a
                >
            </div>
        </div>
    </li>

    <!-- Nav Item - Product Collapse Menu -->
    <li class="nav-item">
        <a
            class="nav-link collapsed"
            href="#"
            data-toggle="collapse"
            data-target="#collapseProduct"
            aria-expanded="true"
            aria-controls="collapseProduct"
        >
            <i class="fas fa-fw fa-box"></i>
            <span>Produk</span>
        </a>
        <div
            id="collapseProduct"
            class="collapse"
            aria-labelledby="headingTwo"
            data-parent="#accordionSidebar"
        >
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('products.index') }}"
                    >List Produk</a
                >
                <a class="collapse-item" href="{{ route('products.create') }}"
                    >Tambah Produk Baru</a
                >
            </div>
        </div>
    </li>

    <!-- Nav Item - Transaction Collapse Menu -->
    <li class="nav-item">
        <a
            class="nav-link collapsed"
            href="#"
            data-toggle="collapse"
            data-target="#collapseTransaksi"
            aria-expanded="true"
            aria-controls="collapseTransaksi"
        >
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>Transaksi</span>
        </a>
        <div
            id="collapseTransaksi"
            class="collapse"
            aria-labelledby="headingTwo"
            data-parent="#accordionSidebar"
        >
            <div class="bg-white py-2 collapse-inner rounded">
                <a
                    class="collapse-item"
                    href="{{ route('transactions.index') }}"
                    >List Transaksi</a
                >
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider" />

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    <div class="sidebar-card">
        <h6>WEB VERSION</h6>
        <p class="text-center mb-2">Tyaga SHOP v1</p>
    </div>
</ul>
