<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="zxx"> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang="zxx"> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang="zxx"> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" lang="zxx"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>BootStrap HTML5 CSS3 Theme</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="favicon.png">
	<link rel="stylesheet" href="{{asset('assets/customer/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/customer/css/bootstrap-slider.css')}}">
	<link rel="stylesheet" href="{{asset('assets/customer/css/normalize.css')}}">
	<link rel="stylesheet" href="{{asset('assets/customer/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/customer/css/icomoon.css')}}">
	<link rel="stylesheet" href="{{asset('assets/customer/css/chosen.css')}}">
	<link rel="stylesheet" href="{{asset('assets/customer/css/prettyPhoto.css')}}">
	<link rel="stylesheet" href="{{asset('assets/customer/css/scrollbar.css')}}">
	<link rel="stylesheet" href="{{asset('assets/customer/css/morris.css')}}">
	<link rel="stylesheet" href="{{asset('assets/customer/css/owl.carousel.css')}}">
	<link rel="stylesheet" href="{{asset('assets/customer/css/YouTubePopUp.css')}}">
	<link rel="stylesheet" href="{{asset('assets/customer/css/auto-complete.css')}}">
	<link rel="stylesheet" href="{{asset('assets/customer/css/jquery.navhideshow.css')}}">
	<link rel="stylesheet" href="{{asset('assets/customer/css/transitions.css')}}">
	<link rel="stylesheet" href="{{asset('assets/customer/style.css')}}">
	<link rel="stylesheet" href="{{asset('assets/customer/dbstyle.css')}}">
	<link rel="stylesheet" href="{{asset('assets/customer/css/color.css')}}">
	<link rel="stylesheet" href="{{asset('assets/customer/css/responsive.css')}}">
	<link rel="stylesheet" href="{{asset('assets/customer/css/dbresponsive.css')}}">
	<script src="{{asset('assets/customer/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')}}"></script>
	@yield('additional_css')
</head>
<body>
    <!--************************************
			Preloader Start
	*************************************-->
	<div class="preloader-outer">
		<div class="pin"></div>
		<div class="pulse"></div>
	</div>
	<!--************************************
			Preloader End
	*************************************-->
    <!--************************************
			Wrapper Start
	*************************************-->
	<div id="listar-wrapper" class="listar-wrapper listar-haslayout">

    <!--************************************
				Header Start
		*************************************-->
        @include('customer.inc.customer-header')
		<!--************************************
				Header End
		*************************************-->
        @yield('content')
		<!--************************************
					Footer Start
		*************************************-->
        @include('customer.inc.customer-footer')
		<!--************************************
					Footer End
		*************************************-->
	</div>
	<!--************************************
				Wrapper End
	*************************************-->
	@yield('script')
    @stack('scripts')
	<script src="{{asset('assets/customer/js/vendor/jquery-library.js')}}"></script>
	<script src="{{asset('assets/customer/js/vendor/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets/customer/js/mapclustering/data.json')}}"></script>
	<!-- <script src="https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&amp;language=en"></script> -->
	<script src="{{asset('assets/customer/js/tinymce/tinymce.min.js?apiKey=4cuu2crphif3fuls3yb1pe4qrun9pkq99vltezv2lv6sogci')}}"></script>
	<script src="https://www.gstatic.com/charts/loader.js"></script>
	<script src="{{asset('assets/customer/js/mapclustering/markerclusterer.min.js')}}"></script>
	<script src="{{asset('assets/customer/js/mapclustering/infobox.js')}}"></script>
	<script src="{{asset('assets/customer/js/mapclustering/map.js')}}"></script>
	<script src="{{asset('assets/customer/js/ResizeSensor.js.js')}}"></script>
	<script src="{{asset('assets/customer/js/jquery.sticky-sidebar.js')}}"></script>
	<script src="{{asset('assets/customer/js/YouTubePopUp.jquery.js')}}"></script>
	<script src="{{asset('assets/customer/js/jquery.navhideshow.js')}}"></script>
	<script src="{{asset('assets/customer/js/backgroundstretch.js')}}"></script>
	<script src="{{asset('assets/customer/js/jquery.sticky-kit.js')}}"></script>
	<script src="{{asset('assets/customer/js/bootstrap-slider.js')}}"></script>
	<script src="{{asset('assets/customer/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('assets/customer/js/jquery.vide.min.js')}}"></script>
	<script src="{{asset('assets/customer/JS/auto-complete.js')}}"></script>
	<script src="{{asset('assets/customer/js/chosen.jquery.js')}}"></script>
	<script src="{{asset('assets/customer/js/scrollbar.min.js')}}"></script>
	<script src="{{asset('assets/customer/js/isotope.pkgd.js')}}"></script>
	<script src="{{asset('assets/customer/js/jquery.steps.js')}}"></script>
	<script src="{{asset('assets/customer/js/prettyPhoto.js')}}"></script>
	<script src="{{asset('assets/customer/js/raphael-min.js')}}"></script>
	<script src="{{asset('assets/customer/js/parallax.js')}}"></script>
	<script src="{{asset('assets/customer/js/sortable.js')}}"></script>
	<script src="{{asset('assets/customer/js/countTo.js')}}"></script>
	<script src="{{asset('assets/customer/js/appear.js')}}"></script>
	<script src="{{asset('assets/customer/js/gmap3.js')}}"></script>
	<script src="{{asset('assets/customer/js/dev_themefunction.js')}}"></script>
	
	@yield('customer-script')
	@stack('customer-script')
</body>
</html>    