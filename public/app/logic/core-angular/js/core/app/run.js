(function(angular) {
    angular
        .module('app')
        .run([
            '$rootScope', '$mdSidenav', 'leafletBoundsHelpers',
            function($rootScope, $mdSidenav) {
                $rootScope.bounds = {
                    northEast: {
                        lat: 20.332189,
                        lng: 125.1616331
                    },
                    southWest: {
                        lat: 5.751745,
                        lng: 116.525891
                    }
                };

                $rootScope.config = {
                    scrollWheelZoom: false
                };

                $rootScope.openLeftMenu = function() {
                    $mdSidenav('asdf').toggle();
                };
            }
        ])
    ;
})(angular);
