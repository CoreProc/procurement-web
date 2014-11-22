<!DOCTYPE html>
<html ng-app="app" id="overlay" ng-style="{ 'overflow-y': $media('xs') ? '' }">
<head>
    <meta charset="UTF-8">
    <title>Home | ProcEx - PROCurement EXplorer</title>
    <link rel="stylesheet" type="text/css" href="<% asset('style.css') %>">
    <link rel="stylesheet" type="text/css" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css">
</head>
<body layout="column" layout-fill ng-controller="RootCtrl">

<div layout-fill class="overlay resultsOverlay">
    <!-- <h2>Search returned {{ cardTest.length + (cardTest.length == 1 ? ' result' : ' results') }}</h2> -->
    <md-card ng-repeat="card in cardTest" class="card md-default-theme">
        <button class="close">&times;</button>
        <h3 ng-bind="card.name"></h3>
        <h4 ng-bind="card.budget"></h4>
    </md-card>
</div>

<md-content layout="column" layout-fill>
    <main flex>
        <leaflet height="100%" maxbounds="bounds" defaults="config"></leaflet>
    </main>
</md-content>

<md-sidenav style="width: 500px" is-locked-open="true" component-id="regions">
    <md-toolbar>
        <h2 class="md-toolbar-tools">
            <span>Filters</span>
        </h2>
    </md-toolbar>
    <md-content flex class="sidebar sidebar-regions">
        <md-tabs selected="0">
            <md-tab label="Area">
                <div layout="row">
                    <md-content flex>
                        <section ng-repeat="region in regions">
                            <md-subheader class="md-primary">{{ region.name }}</md-subheader>
                            <md-button class="list-item" ng-repeat="province in region.provinces">{{ province }}</md-button>
                        </section>
                    </md-content>
                </div>
            </md-tab>
            <md-tab label="Category">
                Cate
            </md-tab>
            <md-tab label="Classifications">
                Doge
            </md-tab>
        </md-tabs>
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