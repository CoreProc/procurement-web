<!DOCTYPE html>
<html ng-app="app" id="overlay">
<head>
    <meta charset="UTF-8">
    <title>Home | ProcEx - PROCurement EXplorer</title>
    <link rel="stylesheet" type="text/css" href="<% asset('style.css') %>">
    <link rel="stylesheet" type="text/css" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css">
</head>
<body layout="row" layout-fill ng-controller="RootCtrl as ctrl">

<button ng-click="ctrl.filtersOpen = !ctrl.filtersOpen" ng-style="{ 'left': ((ctrl.filtersOpen ? 365 : 0) + 32) + 'px', 'color': ctrl.filtersOpen ? '#03A9F4' : '#333' }" style="font-size: 24px; position: fixed; top: 0; width: 48px; height: 48px; z-index: 10; background: none; border: none; text-shadow: 1px 1px 0 rgba(255, 255, 255, 1)"><i class="fa fa-fw fa-bars"></i></button>

<div layout-fill class="overlay resultsOverlay" style="padding-top: 56px">
    <!-- <h2>Search returned {{ cardTest.length + (cardTest.length == 1 ? ' result' : ' results') }}</h2> -->
    <!--
    <div class="panel panel-bidList" style="height: 48px">
        <select>
            <option>adfasdfasdf1</option>
            <option>adfasdfasdf2</option>
            <option>adfasdfasdf3</option>
            <option>adfasdfasdf4</option>
            <option>adfasdfasdf5</option>
        </select>
    </div>
    <div class="panel panel-tenderStatuses" style="top: 51px; height: 104px">
        <div ng-repeat="status in tenderStatuses">
            <md-checkbox ng-model="status" aria-label="{{ status }}">{{ status }}</md-checkbox>
        </div>
    </div>
    -->
    <div class="panel panel-searchInput">
        <input type="text" ng-model="search.query" ng-disabled="cardTest.length < 3" placeholder="{{ cardTest.length > 0 ? 'Type keywords here to filter results' : 'Select your search critera first' }}">
    </div>
    <div class="panel panel-searchResults">
        <md-card ng-repeat="card in cardTest | filter: search.query" class="card md-default-theme">

            <!-- <button class="close">&times;</button> -->

            <h2 ng-bind="card.name"></h2>
            <h4 ng-bind="card.budget"></h4>
        </md-card>
    </div>
</div>

</div>

<md-sidenav is-locked-open="ctrl.filtersOpen" component-id="filters" style="width: 500px">
    <div layout="vertical" layout-fill style="height: 100%">
        <md-toolbar class="md-default-theme">
            <div class="md-toolbar-tools">
                <span>Filters</span>
                <span flex></span>
                <md-button ng-click="ctrl.applyFilters()">Apply</md-button>
            </div>
        </md-toolbar>
        <div flex style="height: 100%">
            <div layout-fill style="height: 100%">
                <md-content layout-fill scroll-y class="sidebar sidebar-regions" style="height: 100%">
                    <md-tabs noink="true" nobar="true" selected="0" class="md-default-theme">
                        <md-tab label="Area">
                            <div layout="row">
                                <md-content flex>
                                    <section ng-repeat="region in ctrl.regions" layout="vertical">
                                        <md-subheader>{{ region.name }}</md-subheader>
                                        <md-button class="list-item" ng-repeat="province in region.provinces" ng-class="{ 'focus': province.selected }" ng-click="province.selected = !province.selected">{{ province.name }}</md-button>
                                    </section>
                                </md-content>
                            </div>
                        </md-tab>
                        <md-tab label="Category">
                            <div layout="row">
                                <md-content flex>
                                    <section ng-repeat="cat in ctrl.categories" layout="vertical">
                                        <!-- <md-subheader>{{ region.name }}</md-subheader> -->
                                        <md-button class="list-item" ng-class="{ 'focus': cat.selected }" ng-click="cat.selected = !cat.selected">{{ cat.name }}</md-button>
                                    </section>
                                </md-content>
                            </div>
                        </md-tab>
                        <md-tab label="Classifications">
                            <div layout="row">
                                <md-content flex>
                                    <section ng-repeat="clsf in ctrl.classifications" layout="vertical">
                                        <!-- <md-subheader>{{ region.name }}</md-subheader> -->
                                        <md-button class="list-item" ng-class="{ 'focus': clsf.selected }" ng-click="clsf.selected = !clsf.selected">{{ clsf.name }}</md-button>
                                    </section>
                                </md-content>
                            </div>
                        </md-tab>
                    </md-tabs>
                </md-content>
            </div>
        </div>
    </div>
</md-sidenav>

<md-content layout="vertical" layout-fill>
    <main flex>
        <leaflet height="100%" maxbounds="mapConfig.bounds" center="mapConfig.center" markers="mapConfig.markers" event-broadcast="mapConfig.events"></leaflet>
    </main>
</md-content>

<md-sidenav class="md-sidenav-right" is-open="true" component-id="info">
<hgroup class="info-headings">
<h1 ng-bind="selected.name">Title</h1>
<h2 ng-bind="selected.price">Php 1,000,000.00</h2>
</hgroup>
</md-sidenav>

</div>
<script src="<% asset('script.min.js') %>"></script>
</body>
</html>