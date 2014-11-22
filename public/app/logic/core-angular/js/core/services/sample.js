(function(angular) {

    /**
     * @ngInject
     */
    function SampleService(Restangular) {
        var serviceRoute = 'sample';

        var restangular = Restangular.withConfig(function(RestangularConfigurer) {
            RestangularConfigurer.setBaseUrl(
                Restangular
                    .configuration
                    .baseUrl + '/' + serviceRoute
            );
        });

        /*
        this.get = function() {
            return restangular.one('route').get();
        };
        */
    }

    // inject services to each controller constructor
    SampleService.$inject     = ['Restangular'];

    // register controllers to Angular
    angular
        .module('app.services')
        .service('SampleService', SampleService);

})(angular);
