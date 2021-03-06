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
    <% HTML::style('assets/css/slideshow/css/style2.css') %>
    <% HTML::style('assets/css/main.css') %>
    <% HTML::script('assets/js/modernizr.custom.86080.js') %>
    <link rel="shortcut icon" href="<% asset('favicon.ico') %>"/>
</head>
<body>
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<header>
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
                <div class="get-started-container">
                    <img class="home-logo" src="<% asset('assets/img/icon_procex_blue.png') %>" alt="logo" />
                    <h1 class="title">
                        <span class="blue">Proc</span><span class="red">Ex</span>
                    </h1>
                    <div class="caption">Procurement Explorer</div>

                    <div class="map-marker"><i class="fa fa-map-marker"></i></div>

                    <div class="row">
                        <div class="small-6 columns button-container-1"><a href="<% url('explore') %>" class="button large get-started-btn">Get Started</a></div>
                        <div class="small-6 columns button-container-2"><a href="<% url('services') %>" class="button large services-btn">SMS services</a></div>
                    </div>

                    <div class="row">
                        <div class="medium-3 columns invisible-grid">&nbsp;</div>
                        <div class="medium-6 columns sms-info">
                            <p>To access the Procex API from your phone, just text the keyword <strong class="blue">INFO</strong> to <strong class="red">21589393</strong> and reply <span class="blue">YES</span></p>
                        </div>
                        <div class="medium-3 columns invisible-grid">&nbsp;</div>
                    </div>

                    <div class="google-play-logo">
                        <a href="<% url('procex.apk') %>">
                        <img src="<% asset('assets/img/google-play.png') %>" alt="logo" />
                        </a>
                    </div>

                    <div class="social">
                        <a href="https://www.facebook.com/pages/PhilGEPS/294475860570501" target="new"><i class="fa fa-facebook"></i></a>
                        <a href="https://twitter.com/PhilGEPSTweets" target="new"><i class="fa fa-twitter"></i></a>
                        <a href="http://coreproc.github.io/procurement-web" target="new"><i class="fa fa-git"></i></a>
                    </div>

                    <div class="copyright">Copyright © 2014 ProcEx All Right Reserved</div>
                </div>

            </div>
        </div>
    </div>
</header>
</body>
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
