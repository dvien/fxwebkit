<!DOCTYPE html>
<!--[if IE 8]>         <html class="ie8"> <![endif]-->
<!--[if IE 9]>         <html class="ie9 gt-ie8"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="gt-ie8 gt-ie9 not-ie"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Error 404 - Pages - PixelAdmin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

	<!-- Open Sans font from Google CDN -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&subset=latin" rel="stylesheet" type="text/css">

	<!-- Pixel Admin's stylesheets -->
	<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/pixel-admin.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/pages.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/rtl.min.css') }}" rel="stylesheet" type="text/css">

	<!--[if lt IE 9]>
		<script src="assets/javascripts/ie.min.js"></script>
	<![endif]-->

</head>


<!-- 1. $BODY ======================================================================================

	Body

	Classes:
	* 'right-to-left' - Sets text direction to right-to-left
-->
<body class="page-404">

<script>var init = [];</script>

	<div class="header">
		<a href="index.html" class="logo">
			<div class="demo-logo"></div>&nbsp;
			<strong>Pixel</strong>Admin
		</a> <!-- / .logo -->
	</div> <!-- / .header -->

	<div class="error-code">404</div>

	<div class="error-text">
		<span class="oops">OOPS!</span><br>
		<span class="hr"></span>
		<br>
		SOMETHING WENT WRONG, OR THAT PAGE DOESN'T EXIST... YET
	</div> <!-- / .error-text -->


<!-- Get jQuery from Google CDN -->
<!--[if !IE]> -->
	<script type="text/javascript"> window.jQuery || document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js">'+"<"+"/script>"); </script>
<!-- <![endif]-->
<!--[if lte IE 9]>
	<script type="text/javascript"> window.jQuery || document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js">'+"<"+"/script>"); </script>
<![endif]-->


<!-- Pixel Admin's javascripts -->
<script src="assets/javascripts/bootstrap.min.js"></script>
<script src="assets/javascripts/pixel-admin.min.js"></script>

<script type="text/javascript">
	init.push(function () {
		// Javascript code here
	})
	window.PixelAdmin.start(init);
</script>

</body>
</html>