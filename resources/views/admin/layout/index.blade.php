<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Admin Dashboard | {{ env('APP_NAME') }}</title>

		{{-- all css files goes here --}}
        @include('admin.partials.css')
		<!-- jQuery -->
        <script src="{{ asset('contents/admin') }}/plugins/jquery/jquery.min.js"></script>
    </head>
    <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="wrapper" id="app">
            <!-- Preloader -->
            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__wobble" src="{{ asset('contents/admin') }}/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60" />
            </div>

            <!-- Navbar -->
            @include('admin.include.nav')
            
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            @include('admin.include.sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                @include('admin.include.breadcrumb')
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                    <!--/. container-fluid -->
                </section>
                <!-- /.content -->
            </div>
			<!-- /.content-wrapper -->
        </div>


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
        @include('admin.include.footer')
        <!-- Main Footer -->
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->
        @include('admin.partials.javascript')
    </body>
</html>
