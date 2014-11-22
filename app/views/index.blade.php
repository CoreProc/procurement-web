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
	<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <% HTML::style('assets/css/normalize.css') %>
        <% HTML::style('assets/css/foundation/css/foundation.min.css') %>
        <% HTML::style('assets/js/vendor/slideshow/css/demo.css') %>
        <% HTML::style('assets/js/vendor/slideshow/css/style2.css') %>
        <% HTML::style('assets/css/main.css') %>
        <% HTML::script('assets/js/vendor/slideshow/js/modernizr.custom.86080.js') %>

        <link rel="shortcut icon" href="<% asset('favicon.ico') %>"/>
</head>
<body>
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->


<ul class="cb-slideshow">
    <li><span>Image 01</span></li>
    <li><span>Image 02</span></li>
    <li><span>Image 03</span></li>
    <li><span>Image 04</span></li>
    <li><span>Image 05</span></li>
</ul>

<div class="wrapper">
    <div class="row content-row">
        <div class="large-12 columns">
            <h1 class="title">
                <span class="blue">Proc</span><span class="red">Ex</span>
            </h1>
            <div class="caption">Procurement Explorer</div>
            <div class="map-marker"><i class="fa fa-map-marker"></i></div>
            <div class="button-container"><a href="#" class="button large success">Get Started</a></div>
            <div class="copyright">Copyright © 2014 ProcEx All Right Reserved</div>
            <div class="social">
                <i class="fa fa-facebook"></i>
                <i class="fa fa-twitter"></i>
            </div>
        </div>
    </div>

</div>

</body>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
<% HTML::script('assets/js/plugins.js') %>
<% HTML::script('assets/js/main.js') %>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->

<script>
 (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
 (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
 m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
 })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

 ga('create', 'UA-57001888-1', 'auto');
 ga('send', 'pageview');

</script>
</body>
</html>
