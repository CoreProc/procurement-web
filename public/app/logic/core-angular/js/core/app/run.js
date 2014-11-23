(function(angular) {
    angular
        .module('app')
        .run([
            '$rootScope', '$mdSidenav',
            function($rootScope, $mdSidenav) {
                $rootScope.mapConfig = {
                    /*
                    bounds: {
                        northEast: {
                            lat: 25.332189,
                            lng: 136.1616331
                        },
                        southWest: {
                            lat: 0.751745,
                            lng: 105.525891
                        }
                    },*/
                    defaults: {
                        scrollWheelZoom: true
                    },
                    center: { lat: 12.640338306846802, lng: 120.84960937499999, zoom: 5 },
                    markers: {
                        center: {
                            lat: 0,
                            lng: 0,
                            focus: false,
                            draggable: false
                        }
                    }
                };

                angular.element(function() {
                    angular.element(window).resize();
                });
            }
        ])
    ;
})(angular);
