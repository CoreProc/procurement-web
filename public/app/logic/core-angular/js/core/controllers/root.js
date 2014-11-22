(function(angular) {

    /**
     * @ngInject
     */
    function RootCtrl($scope, CategoryService, UtilityService, MapService, $mdBottomSheet) {
        var vm = this;
        vm.regionData = { data: [], style: {} };
        vm.provinceData = { data: [], style: {} };
        vm.mapData = vm.regionData;

        CategoryService
            .getAll()
            .then(function(response) {
                if(response.status != 'ok')
                    throw new Error('Error getting categories');
                vm.categories = response.data;
            });

        MapService
            .getRegions()
            .then(function(response) {
                //if(response.status != 'ok')
                //    throw new Error('Error getting regions data');
                vm.regionData = {
                    data: response.geometries,
                    style: {
                        fillColor: "blue",
                        weight: 2,
                        opacity: 0.25,
                        color: 'white',
                        dashArray: '3',
                        fillOpacity: 0.25
                    }
                };

                vm.mapData = vm.regionData;
            });

        MapService
            .getProvinces()
            .then(function(response) {
                //if(response.status != 'ok')
                //    throw new Error('Error getting provinces data');
                vm.provinceData = {
                    data: response.geometries,
                    style: {
                        fillColor: "green",
                        weight: 0,
                        opacity: 0,
                        color: 'white',
                        dashArray: 0,
                        fillOpacity: 1
                    }
                };
            });
    }

    // inject services to each controller constructor
    RootCtrl.$inject     = ['$scope', 'CategoryService', 'UtilityService', 'MapService', '$mdBottomSheet'];

    // register controllers to Angular
    angular
        .module('app.controllers')
        .controller('RootCtrl', RootCtrl);
})(angular);
