(function(angular) {

    /**
     * @ngInject
     */
    function SampleCtrl($scope, $stateParams) {
        var vm = this;
    }

    // inject services to each controller constructor
    SampleCtrl.$inject     = ['$scope', '$stateParams'];

    // register controllers to Angular
    angular
        .module('app.controllers')
        .controller('SampleCtrl', SampleCtrl);

})(angular);
