(function(angular) {
    angular
        .module('app')
        .run([
            '$rootScope', '$mdSidenav',
            function($rootScope, $mdSidenav) {
                $rootScope.openLeftMenu = function() {
                    $mdSidenav('asdf').toggle();
                };
            }
        ])
    ;
})(angular);
