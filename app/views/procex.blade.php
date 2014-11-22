<!DOCTYPE html>
<html ng-app="app">
<head>
    <meta charset="UTF-8">
    <title>Hello world</title>
    <link rel="stylesheet" type="text/css" href="<% asset('style.css') %>">
    <link rel="stylesheet" type="text/css" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css">
</head>
<body layout="column" layout-fill>

<md-sidenav component-id="asdf" class="md-sidenav-left">
    Left Nav!
</md-sidenav>

<md-content layout="column" layout-fill>
    <main flex>
        <leaflet height="100%" maxbounds="bounds" defaults="config"></leaflet>
    </main>
</md-content>

<md-sidenav is-locked-open="true" component-id="regions">
    <md-toolbar>
        <h2 class="md-toolbar-tools">
            <span>Regions</span>
        </h2>
    </md-toolbar>
    <md-content flex class="sidebar sidebar-regions">
        <md-button class="list-item" ng-repeat="region in regions">{{region.name}}</md-button>
    </md-content>
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