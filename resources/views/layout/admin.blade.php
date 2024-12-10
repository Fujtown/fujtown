<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Zoogler - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Mannatthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="{{asset('assets/imgs/template/fav.png')}}">

        <link href="{{asset('assets/admin/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/admin/css/icons.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/admin/css/style.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('assets/admin/css/admin-custom.css') }}">
        @yield('additional_css')
    </head>


    <body class="fixed-left">

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>
         <!-- Begin page -->
         <div id="wrapper">

           <!-- ========== Left Sidebar Start ========== -->
           @include('admin.include.sidebar')
            <!-- Left Sidebar End -->


             <!-- Start right Content here -->

             <div class="content-page">
                   <!-- Start content -->
                   <div class="content">
                    <!-- Top Bar Start -->
                    @include('admin.include.topbar')
                    <!-- Top Bar End -->
                   </div>    <!-- content -->
             @yield('content')
        <footer class="footer">
                    © 2022 Zoogler by Mannatthemes.
                </footer>

            </div>
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->


        <!-- jQuery  -->
        <script src="{{asset('assets/admin/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/popper.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/modernizr.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/detect.js')}}"></script>
        <script src="{{asset('assets/admin/js/fastclick.js')}}"></script>
        <script src="{{asset('assets/admin/js/jquery.slimscroll.js')}}"></script>
        <script src="{{asset('assets/admin/js/jquery.blockUI.js')}}"></script>
        <script src="{{asset('assets/admin/js/waves.js')}}"></script>
        <script src="{{asset('assets/admin/js/jquery.nicescroll.js')}}"></script>
        <script src="{{asset('assets/admin/js/jquery.scrollTo.min.js')}}"></script>

        <script src="{{asset('assets/admin/plugins/chart.js/chart.min.js')}}"></script>
        <script src="{{asset('assets/admin/pages/dashboard.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('assets/admin/js/app.js')}}"></script>
        
        @yield('admin-script')
        @stack('admin-script')
    </body>
</html>