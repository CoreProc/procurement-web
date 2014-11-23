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
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <% HTML::style('assets/css/normalize.css') %>
    <% HTML::style('assets/css/foundation/css/foundation.min.css') %>
    <% HTML::style('assets/css/services.css') %>
    <% HTML::script('assets/js/modernizr.custom.86080.js') %>
    <link rel="shortcut icon" href="<% asset('favicon.ico') %>"/>
</head>

<body>
    <header>
        <div class="row">
            <div class="large-12 columns">
                <h1 class="title">
                    <span class="blue">Proc</span><span class="red">Ex</span>
                </h1>
            </div>
        </div>
    </header>
    <div class="content">
        <div class="row">
            <div class="large-12 columns how-to">
                <h4 class="red"><i class="fa fa-mobile-phone"></i> SMS Services</h4>
                <p>Access the ProcEx API from your GSM phone by texting the keyword INFO to 21589393, then reply YES (FREE of charge.)</p>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns how-to">
                <h4 class="red"><i class="fa fa-key"></i> Keywords</h4>
                <p>All keywords are prefixed with the string PROCEX.</p>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns how-to">
                <h5>Help</h5>
                <p>Get quick help on keywords and stuff.</p>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns how-to inquire">
                <h5>INQUIRE</h5>
                <p>Inquire about the summary of information on bids at your location.</p>
                <div class="bordered-info orange">
                    PROCEX INQUIRE
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="large-12 columns how-to">
                <h5>SEARCH</h5>
                <p>Get a summary of bids using specialty keywords and filters.</p>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns how-to">
                <h5>Classification</h5>
                <p>Get the complete list of classification names <a href="https://procex.coreproc.ph/api/classifications">here.</a></p>
                <h6>Syntax:</h6>
                <div class="bordered-info orange">
                    PROCEX SEARCH CLASSIFICATION &lt;NAME&gt; &lt;YEAR [optional]&gt;
                </div>
                <h6 class="example">Example:</h6>
                <div class="bordered-info orange">
                    PROCEX SEARCH CLASSIFICATION GOODS 2009
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="large-12 columns how-to">
                <h5>Area</h5>
                <p>Get the complete list of areas <a href="https://procex.coreproc.ph/api/areas">here.</a></p>
                <h6>Syntax:</h6>
                <div class="bordered-info orange">
                    PROCEX SEARCH AREA &lt;NAME&gt; &lt;YEAR [optional]&gt;
                </div>
                <h6 class="example">Example:</h6>
                <div class="bordered-info orange">
                    PROCEX SEARCH AREA CAVITE 2009
                </div>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns how-to">
                <h4 class="category">Category</h4>
                <p>Get the complete list of category names <a href="https://procex.coreproc.ph/api/categories">here.</a></p>
                <h6>Syntax:</h6>
                <div class="bordered-info orange">
                    PROCEX SEARCH CATEGORY &lt;NAME&gt; &lt;YEAR [optional]&gt;
                </div>
                <h6 class="example">Example:</h6>
                <div class="bordered-info orange">
                    PROCEX SEARCH CATEGORY AGRICULTURE
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="large-12 columns go-back">
                <a href="<% url() %>"><h5 class="category blue">Go back</h5></a>
            </div>
        </div>

    </div>
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
