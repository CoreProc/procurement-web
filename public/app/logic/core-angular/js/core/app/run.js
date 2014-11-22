(function(angular) {
    angular
        .module('app')
        .run([
            '$rootScope', '$mdSidenav',
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

                $rootScope.regions = [
                    { name: "Region I"},
                    { name: "CAR"},
                    { name: "Region II"},
                    { name: "Region III"},
                    { name: "Region IV-A"},
                    { name: "Region IV-B"},
                    { name: "NCR"},
                    { name: "Region V"},
                    { name: "Region VI"},
                    { name: "Region VII"},
                    { name: "Region VIII"},
                    { name: "Region IX"},
                    { name: "Region X"},
                    { name: "Region XI"},
                    { name: "Region XII"},
                    { name: "Region XIII"},
                    { name: "ARMM"}
                ];

                $rootScope.openLeftMenu = function() {
                    $mdSidenav('asdf').toggle();
                };
            }
        ])
    ;
})(angular);
