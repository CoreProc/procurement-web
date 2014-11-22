<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    {{ HTML::style('assets/css/normalize.css') }}
    {{ HTML::style('assets/css/foundation/css/foundation.min.css') }}
    {{ HTML::style('assets/css/main.css') }}
    {{ HTML::style('assets/js/vendor/modernizr-2.6.2.min.js') }}
</head>
<body>
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->



<header>
    <div class="header-bg">
        <div class="row">
            <div class="large-12 columns">
                <h1 class="title">
                    <span style="color: #16A0E7;">Proc</span><span style="color: #F22727;">Ex</span>
                </h1>
                <div class="caption">lorem ipsum dolor sit amet dolorem</div>
            </div>
        </div>
    </div>
</header>

<div class="row">
    <div class="large-12 columns">
        This is the content
    </div>
</div>




<footer>
    <div class="row">
        <div class="large-12 columns">
            This is the footer
        </div>
    </div>
</footer>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
{{ HTML::script('assets/js/plugins.js') }}
{{ HTML::script('assets/js/main.js') }}

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
	(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
		function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
		e=o.createElement(i);r=o.getElementsByTagName(i)[0];
		e.src='//www.google-analytics.com/analytics.js';
		r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
	ga('create','UA-XXXXX-X');ga('send','pageview');
</script>
</body>
</html>
