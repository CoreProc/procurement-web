(function(angular) {

    /**
     * @ngInject
     */
    function RootCtrl($scope, $mdSidenav) {
        var vm = this;

        $scope.openLeftMenu = function() {
            //$mdSidenav('asdf').toggle();
        };
    }

    // inject services to each controller constructor
    RootCtrl.$inject     = ['$scope', '$mdSidenav'];

    // register controllers to Angular
    angular
        .module('app.controllers')
        .controller('RootCtrl', RootCtrl);

})(angular);
