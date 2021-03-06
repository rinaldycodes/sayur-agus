<!DOCTYPE html>
<html lang="en">
    <head>
        @include('templates.backend.includes.head')
    </head>

    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            @if (Auth::user()->role == 'ADMIN')
            <!-- Sidebar ADMIN -->
            @include('templates.backend.includes.sidebar-admin')
            <!-- Sidebar ADMIN -->
            @else
            <!-- Sidebar USER -->
            @include('templates.backend.includes.sidebar-user')
            <!-- Sidebar USER -->
            @endif
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <!-- Topbar -->
                    @include('templates.backend.includes.navbar-admin')
                    <!-- End of Topbar -->

                    <!-- will be used to show any messages -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        @if (Session::has('message'))
                        <div class="alert alert-info">
                            {{ Session::get('message') }}
                        </div>
                        @endif @yield('content')
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span
                                >Copyright &copy; {{ config("app.name") }}
                                {{ date("Y") }}</span
                            >
                        </div>
                        <div class="dev my-auto text-center">
                            <span>
                                <small
                                    >Ingin membuat website? Hubungi =>
                                </small>
                                <a
                                    href="https://instagram.com/tyaga.codes"
                                    target="_blank"
                                    class=""
                                    >TYAGA</a
                                >
                            </span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div
            class="modal fade"
            id="logoutModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Kamu yakin mau keluar?
                        </h5>
                        <button
                            class="close"
                            type="button"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">??</span>
                        </button>
                    </div>
                    <div class="modal-body"></div>
                    <div class="modal-footer">
                        <button
                            class="btn btn-secondary"
                            type="button"
                            data-dismiss="modal"
                        >
                            Cancel
                        </button>
                        <a class="btn btn-primary" href="{{ url('/logout') }}"
                            >Logout</a
                        >
                    </div>
                </div>
            </div>
        </div>

        @include('templates.backend.includes.scripts')
    </body>
</html>
