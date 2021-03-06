<!DOCTYPE html>
<html ng-app="app" id="overlay">
<head>
    <meta charset="UTF-8">
    <title>Home | ProcEx - PROCurement EXplorer</title>
    <link rel="stylesheet" type="text/css" href="<% asset('style.css') %>">
    <link rel="stylesheet" type="text/css" href="https://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css">
</head>
<body layout="row" layout-fill ng-controller="RootCtrl as ctrl">

<div layout-fill class="overlay resultsOverlay" style="padding-top: 60px; padding-bottom: 78px">
    <!-- <h2>Search returned {{ ctrl.searchResults.length + (ctrl.searchResults.length == 1 ? ' result' : ' results') }}</h2> -->
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

    </div>
    -->
    <div class="panel panel-searchInput">
        <input type="text" ng-model="search.query" ng-disabled="ctrl.searchResults.length < 3" placeholder="{{ ctrl.searchResults.length > 0 ? 'Type keywords here to filter results' : 'Select your search critera first' }}">
    </div>
    <div class="panel panel-searchResults">
        <md-card ng-repeat="card in ctrl.searchResults | filter: search.query" ng-click="ctrl.showDetails(card)" ng-style="{ 'transition-delay': ($index * 25) + 'ms' }" class="card md-default-theme">

            <!-- <button class="close">&times;</button> -->

            <h2 ng-bind="card.name"></h2>
            <h4 ng-bind="card.approved_budget | currency: 'Php'"></h4>
            <h5 ng-bind="card.notice_type"></h5>
        </md-card>
    </div>
</div>

</div>

<md-sidenav is-locked-open="ctrl.filtersOpen" component-id="filters" style="width: 350px; min-width: 350px">
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
    <div class="header">
        <div flex></div>
        <div class="panel panel-bidList">
            <select ng-options="noticeType.id as noticeType.name for noticeType in ctrl.noticeTypes" ng-model="ctrl.selectedNoticeType"></select>
        </div>
    </div>
    <main flex>
        <button ng-click="ctrl.filtersOpen = !ctrl.filtersOpen" ng-style="{ 'left': '32px', 'color': ctrl.filtersOpen ? '#03A9F4' : '#333' }" style="font-size: 24px; position: absolute; left: 0; top: 0; width: 48px; height: 48px; z-index: 10; background: none; border: none; text-shadow: 1px 1px 0 rgba(255, 255, 255, 1)"><i class="fa fa-fw fa-bars"></i></button>
        <leaflet height="100%" maxbounds="mapConfig.bounds" center="mapConfig.center" markers="mapConfig.markers"></leaflet>
    </main>
    <div class="footer" layout="row">
        <div flex></div>
        <div style="width: 700px;" layout="row">
            <md-checkbox flex ng-repeat="status in ctrl.tenderStatuses" ng-model="ctrl.tenderStatusesChecked[$index]" aria-label="{{ status }}">{{ status }}</md-checkbox>
        </div>
    </div>

</md-content>

<md-sidenav class="md-sidenav-left" component-id="info" style="width: 500px; max-width: 80%; z-index: 1001">
<div layout="vertical" layout-fill>
    <hgroup class="info-headings">
        <h1 ng-bind="ctrl.selectedCard.name"></h1>
        <h2 ng-bind="ctrl.selectedCard.approved_budget | currency: 'Php'"></h2>
    </hgroup>
    <div flex>
        <div layout-fill style="height: 100%">
            <md-content layout-fill scroll-y class="panel panel-info" style="height: 100%">
                <strong>Description</strong>
                <p ng-bind="ctrl.selectedCard.description"></p>

                <strong>Procuring organization</strong>
                <p ng-bind="ctrl.selectedCard.procuring_entity_org.org_name"></p>

                <strong>Location</strong>
                <p ng-bind="ctrl.selectedCard.project_location.location"></p>

                <strong>Tender Status</strong>
                <p ng-bind="ctrl.selectedCard.tender_status"></p>

                <strong>Date</strong>
                <p ng-bind="(ctrl.selectedCard.project_location.modified_date | date) + '&ndash;' + (ctrl.selectedCard.closing_date | date)"></p>
            </md-content>
        </div>
    </div>
</div>
</md-sidenav>

</div>
<script src="<% asset('script.min.js') %>"></script>
</body>
</html>