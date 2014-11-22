(function(angular) {

    /**
     * @ngInject
     */
    function RootCtrl($scope, CategoryService, UtilityService) {
        var vm = this;

        CategoryService
            .getAll()
            .then(function(response) {
                console.log(response);
            });
    }

    // inject services to each controller constructor
    RootCtrl.$inject     = ['$scope', 'CategoryService', 'UtilityService'];

    // register controllers to Angular
    angular
        .module('app.controllers')
        .controller('RootCtrl', RootCtrl);

})(angular);
