<!DOCTYPE html>
<html ng-app="app">
<head>
    <meta charset="UTF-8">
    <title>Hello world</title>
    <link rel="stylesheet" type="text/css" href="<% asset('style.css') %>">
    <link rel="stylesheet" type="text/css" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css">
</head>
<body layout="column" layout-fill>

<md-sidenav md-component-id="asdf" class="md-sidenav-left">
    Left Nav!
</md-sidenav>

<md-content>
    <aside flex="33">
        <md-button ng-click="openLeftMenu()">Open Left Nav</md-button>
    </aside>
    <main flex>
        <leaflet></leaflet>
    </main>
    <aside flex="33"></aside>
</md-content>

<md-sidenav md-component-id="right" class="md-sidenav-right">
    Right Nav!
</md-sidenav>

<!--
<aside flex-sm="33" flex-md="20">
    Menu<br>
    [flex-sm="33"][flex-md="20"]
</aside>

<aside flex-sm="33" flex-md="20">
    Menu<br>
    [flex-sm="33"][flex-md="20"]
</aside>
-->
<script src="<% asset('script.min.js') %>"></script>
</body>
</html>