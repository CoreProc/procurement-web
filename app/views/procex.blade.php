<!DOCTYPE html>
<html ng-app="app" id="overlay">
<head>
    <meta charset="UTF-8">
    <title>Home | ProcEx - PROCurement EXplorer</title>
    <link rel="stylesheet" type="text/css" href="<% asset('style.css') %>">
    <link rel="stylesheet" type="text/css" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css">
</head>
<body layout="row" layout-fill ng-controller="RootCtrl as ctrl">

<div layout-fill class="overlay resultsOverlay" style="padding-top: 160px">
    <!-- <h2>Search returned {{ cardTest.length + (cardTest.length == 1 ? ' result' : ' results') }}</h2> -->
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
    <div class="panel panel-searchResults">
        <md-card ng-repeat="card in cardTest" class="card md-default-theme">

            <!-- <button class="close">&times;</button> -->

            <h2 ng-bind="card.name"></h2>
            <h4 ng-bind="card.budget"></h4>
        </md-card>
    </div>
</div>

<md-content layout="vertical" layout-fill>
    <main flex>
        <leaflet height="100%" maxbounds="bounds" defaults="config"></leaflet>
    </main>
</md-content>

<md-sidenav style="width: 500px" is-locked-open="true" component-id="regions" style="height: 100%" layout-fill>
    <div layout="vertical" layout-fill style="height: 100%">
        <md-toolbar class="md-default-theme">
            <div class="md-toolbar-tools">
                <span>Filters</span>
            </div>
        </md-toolbar>
        <div flex style="height: 100%">
            <div layout-fill style="height: 100%">
                <md-content layout-fill scroll-y class="sidebar sidebar-regions" style="height: 100%">
                    <md-tabs noink="true" nobar="true" selected="0" class="md-default-theme">
                        <md-tab label="Area">
                            <div layout="row">
                                <md-content flex>
                                    <section ng-repeat="region in regions" layout="vertical">
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
                                        <md-button class="list-item">{{ cat }}</md-button>
                                    </section>
                                </md-content>
                            </div>
                        </md-tab>
                        <md-tab label="Classifications">
                            Doge
                        </md-tab>
                    </md-tabs>
                </md-content>
            </div>
        </div>
    </div>
</md-sidenav>
</div>
<script src="<% asset('script.min.js') %>"></script>
</body>
</html>