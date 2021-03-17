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
        <a class="nav-link" href="{{ url('/user') }}">
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
                    >Ganti Password</a
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
            data-target="#collapseYourOrder"
            aria-expanded="true"
            aria-controls="collapseYourOrder"
        >
            <i class="fas fa-fw fa-box"></i>
            <span>Pesanan Kamu</span>
        </a>
        <div
            id="collapseYourOrder"
            class="collapse"
            aria-labelledby="headingTwo"
            data-parent="#accordionSidebar"
        >
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ url('/user/pesanan-kamu') }}"
                    >Pesanan Kamu</a
                >
            </div>
        </div>
    </li>

    <!-- Nav Item - Pembayaran Collapse Menu -->
    <li class="nav-item">
        <a
            class="nav-link collapsed"
            href="#"
            data-toggle="collapse"
            data-target="#collapsePembayaran"
            aria-expanded="true"
            aria-controls="collapsePembayaran"
        >
            <i class="fas fa fa-credit-card"></i>
            <span>Pembayaran</span>
        </a>
        <div
            id="collapsePembayaran"
            class="collapse"
            aria-labelledby="headingTwo"
            data-parent="#accordionSidebar"
        >
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('pembayaran.index') }}"
                    >Pembayaran</a
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
</ul>
