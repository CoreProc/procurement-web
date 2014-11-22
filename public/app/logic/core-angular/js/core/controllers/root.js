(function(angular) {

    /**
     * @ngInject
     */
    function RootCtrl($scope, CategoryService, UtilityService, MapService, ClassificationService, SearchService, $mdBottomSheet) {
        var vm = this;
        vm.regionData = { data: [], style: {} };
        vm.provinceData = { data: [], style: {} };
        vm.mapData = vm.regionData;
        vm.filtersOpen = true;

        vm.regions = [
            { "name": "ARMM", "provinces": [
                { "name": "Lanao del Sur" },
                { "name": "Maguindanao" },
                { "name": "Sulu" },
                { "name": "Tawi-Tawi" },
                { "name": "Basilan" }
            ]},
            { "name": "CAR", "provinces": [
                { "name": "Abra" },
                { "name": "Apayao" },
                { "name": "Benguet" },
                { "name": "Ifugao" },
                { "name": "Kalinga" },
                { "name": "Mountain Province" },
            ]},
            { "name": "NCR", "provinces": [
                { "name": "Metro Manila" }
            ]},
            { "name": "Region I", "provinces": [
                { "name": "Ilocos Norte" },
                { "name": "Ilocos Sur" },
                { "name": "La Union" },
                { "name": "Pangasinan" }
            ]},
            { "name": "Region II", "provinces": [
                { "name": "Batanes" },
                { "name": "Cagayan" },
                { "name": "Isabela" },
                { "name": "Nueva Vizcaya" },
                { "name": "Quirino" }
            ]},
            { "name": "Region III", "provinces": [
                { "name": "Aurora" },
                { "name": "Bataan" },
                { "name": "Bulacan" },
                { "name": "Nueva Ecija" },
                { "name": "Pampanga" },
                { "name": "Tarlac" },
                { "name": "Zambales" }
            ]},
            { "name": "Region IV-A", "provinces": [
                { "name": "Batangas" },
                { "name": "Cavite" },
                { "name": "Laguna" },
                { "name": "Quezon" },
                { "name": "Rizal" }
            ]},
            { "name": "Region IV-B", "provinces": [
                { "name": "Marinduque" },
                { "name": "Occidental Mindoro" },
                { "name": "Oriental Mindoro" },
                { "name": "Palawan" },
                { "name": "Romblon" }
            ]},
            { "name": "Region IX", "provinces": [
                { "name": "Zamboanga del Norte" },
                { "name": "Zamboanga del Sur" },
                { "name": "Zamboanga Sibugay" }
            ]},
            { "name": "Region V", "provinces": [
                { "name": "Albay" },
                { "name": "Camarines Norte" },
                { "name": "Camarines Sur" },
                { "name": "Catanduanes" },
                { "name": "Masbate" },
                { "name": "Sorsogon" }
            ]},
            { "name": "Region VI", "provinces": [
                { "name": "Aklan" },
                { "name": "Antique" },
                { "name": "Capiz" },
                { "name": "Guimaras" },
                { "name": "Iloilo" },
                { "name": "Negros Occidental" }
            ]},
            { "name": "Region VII", "provinces": [
                { "name": "Bohol" },
                { "name": "Cebu" },
                { "name": "Negros Oriental" },
                { "name": "Siquijor" }
            ]},
            { "name": "Region VIII", "provinces": [
                { "name": "Biliran" },
                { "name": "Eastern Samar" },
                { "name": "Leyte" },
                { "name": "Northern Samar" },
                { "name": "Samar" },
                { "name": "Southern Leyte" }
            ]},
            { "name": "Region X", "provinces": [
                { "name": "Bukidnon" },
                { "name": "Camiguin" },
                { "name": "Lanao del Norte" },
                { "name": "Misamis Occidental" },
                { "name": "Misamis Oriental" }
            ]},
            { "name": "Region XI", "provinces": [
                { "name": "Compostela Valley" },
                { "name": "Davao del Norte" },
                { "name": "Davao del Sur" },
                { "name": "Davao Occidental" },
                { "name": "Davao Oriental" }
            ]},
            { "name": "Region XII", "provinces": [
                { "name": "Cotabato" },
                { "name": "Sarangani" },
                { "name": "South Cotabato" },
                { "name": "Sultan Kudarat" }
            ]},
            { "name": "Region XIII", "provinces": [
                { "name": "Agusan del Norte" },
                { "name": "Agusan del Sur" },
                { "name": "Dinagat Islands" },
                { "name": "Surigao del Norte" },
                { "name": "Surigao del Sur" }
            ]
            }
        ];

        CategoryService
            .getAll()
            .then(function(response) {
                if(response.status != 'ok')
                    throw new Error('Error getting categories');
                vm.categories = [];
                _.each(response.data, function(i) {
                    vm.categories.push({
                        "name": i
                    });
                });
            });

        ClassificationService
            .getAll()
            .then(function(response) {
                if(response.status != 'ok')
                    throw new Error('Error getting classifications');
                vm.classifications = [];
                _.each(response.data, function(i) {
                    vm.classifications.push({
                        "name": i
                    });
                });
            });

        $scope.$on('leafletDirectiveMap.moveend', function(e, d) {
            UtilityService.getProvince({
                lat: e.targetScope.center['lat'],
                long: e.targetScope.center['lng']
            })
                .then(function(response) {
                    //response.data.province;
                    console.log(response);
                });
        });

        vm.applyFilters = function() {
            vm.filtersOpen = false;
            var selectedProvinces = _.pluck(_.where(_.flatten(_.pluck(vm.regions, 'provinces')), { selected: true }), 'name');
            var selectedCategories = _.pluck(_.where(vm.categories, { selected: true }), 'name');
            var selectedClassifications = _.pluck(_.where(vm.classifications, { selected: true }), 'name');

            SearchService
                .query({
                    'areas[]': selectedProvinces,
                    'categories[]': selectedCategories,
                    'classifications[]': selectedClassifications
                    // TODO year
                })
                .then(function(response) {
                    console.log(response);
                });
        };

        /*
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
            */
    }

    // inject services to each controller constructor
    RootCtrl.$inject     = ['$scope', 'CategoryService', 'UtilityService', 'MapService', 'ClassificationService', 'SearchService', '$mdBottomSheet'];

    // register controllers to Angular
    angular
        .module('app.controllers')
        .controller('RootCtrl', RootCtrl);
})(angular);
