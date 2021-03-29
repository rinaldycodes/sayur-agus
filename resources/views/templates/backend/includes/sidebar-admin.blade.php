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

    <!-- Nav Item - Users Collapse Menu -->
    <li class="nav-item">
        <a
            class="nav-link collapsed"
            href="#"
            data-toggle="collapse"
            data-target="#collapseUsers"
            aria-expanded="true"
            aria-controls="collapseUsers"
        >
            <i class="fas fa-fw fa-users"></i>
            <span>Users</span>
        </a>
        <div
            id="collapseUsers"
            class="collapse"
            aria-labelledby="headingTwo"
            data-parent="#accordionSidebar"
        >
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('users.index') }}"
                    >List</a
                >
                <a class="collapse-item" href="{{ route('users.create') }}"
                    >Tambah</a
                >
            </div>
        </div>
    </li>

    <!-- Nav Item - Sliders Collapse Menu -->
    <li class="nav-item">
        <a
            class="nav-link collapsed"
            href="#"
            data-toggle="collapse"
            data-target="#collapseSlider"
            aria-expanded="true"
            aria-controls="collapseSlider"
        >
            <i class="fas fa-fw fa-image"></i>
            <span>Slider</span>
        </a>
        <div
            id="collapseSlider"
            class="collapse"
            aria-labelledby="headingTwo"
            data-parent="#accordionSidebar"
        >
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('sliders.index') }}"
                    >List Slider</a
                >
                <a class="collapse-item" href="{{ route('sliders.create') }}"
                    >Tambah Slider Baru</a
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

    <!-- Nav Item - Category Collapse Menu -->
    <li class="nav-item">
        <a
            class="nav-link collapsed"
            href="#"
            data-toggle="collapse"
            data-target="#collapseCategory"
            aria-expanded="true"
            aria-controls="collapseCategory"
        >
            <i class="fas fa-fw fa-tag"></i>
            <span>Category</span>
        </a>
        <div
            id="collapseCategory"
            class="collapse"
            aria-labelledby="headingTwo"
            data-parent="#accordionSidebar"
        >
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('categories.index') }}"
                    >List Kategori</a
                >
                <a class="collapse-item" href="{{ route('categories.create') }}"
                    >Tambah Kategori Baru</a
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
                <a class="collapse-item" href="{{ route('laporan.index') }}"
                    >Laporan</a
                >
            </div>
        </div>
    </li>

    <!-- Nav Item - Payment Collapse Menu -->
    <li class="nav-item">
        <a
            class="nav-link collapsed"
            href="#"
            data-toggle="collapse"
            data-target="#collapsePayment"
            aria-expanded="true"
            aria-controls="collapsePayment"
        >
            <i class="fas fa fa-credit-card"></i>
            <span>Payment</span>
        </a>
        <div
            id="collapsePayment"
            class="collapse"
            aria-labelledby="headingTwo"
            data-parent="#accordionSidebar"
        >
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('payments.index') }}"
                    >List
                </a>
                <a class="collapse-item" href="{{ route('payments.create') }}"
                    >Create
                </a>
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
        <p class="text-center mb-2">v1</p>
    </div>
</ul>
