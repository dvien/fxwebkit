<!DOCTYPE html>
<!--[if IE 8]>
<html class="ie8">
<![endif]-->
<!--[if IE 9]>
<html class="ie9 gt-ie8">
<![endif]-->
<!--[if gt IE 9]><!-->
<html class="gt-ie8 gt-ie9 not-ie">
<!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="_token" content="{{ csrf_token() }}" />
	<title>@yield('title') - {{ app_name() }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&subset=latin" rel="stylesheet" type="text/css">
	{!! HTML::style('assets/css/bootstrap.min.css') !!}
	{!! HTML::style('assets/css/pixel-admin.min.css') !!}
	{!! HTML::style('assets/css/pages.min.css') !!}
	{!! HTML::style('assets/css/rtl.min.css') !!}
	{!! HTML::style('assets/css/themes.min.css') !!}
	<!--[if lt IE 9]>
	{!! HTML::script('assets/js/ie.min.js') !!}
	<![endif]-->
</head>
<body class="{{ theme_attr(false) }} {{$class}}">
	<div id="page-signin-bg">
		<div class="overlay"></div>
		{!! HTML::image('assets/img/backgrounds/signin-bg-'.$random.'.jpg') !!}
	</div>

	@yield('content')

	<!--[if !IE]> -->
	{!! HTML::script('assets/js/jquery.2.0.3.min.js') !!}
	<!-- <![endif]-->
	<!--[if lte IE 9]>
	{!! HTML::script('assets/js/jquery.1.8.3.min.js') !!}
	<![endif]-->

	{!! HTML::script('assets/js/bootstrap.min.js') !!}
	{!! HTML::script('assets/js/pixel-admin.min.js') !!}

	<script type="text/javascript">
		var init = [];
		init.push(function () {
			var $ph  = $('#page-signin-bg'), $img = $ph.find('> img');
			$(window).on('resize', function () {
				$img.attr('style', '');
				if ($img.height() < $ph.height()) {
					$img.css({
						height: '100%',
						width: 'auto'
					});
				}
			});
		});
		window.PixelAdmin.start(init);
	</script>
</body>
</html>