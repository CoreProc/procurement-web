(function(angular) {

    /**
     * @ngInject
     */
    function ClassificationService(Restangular) {
        var serviceRoute = 'classifications';

        var restangular = Restangular.withConfig(function(RestangularConfigurer) {
            RestangularConfigurer.setBaseUrl(
                'https://procex.coreproc.ph'
                //'https://procex.dev'
            );
        });

        this.getAll = function(params) {
            return restangular
                .one('api')
                .one(serviceRoute)
                .get();
        };
    }

    // inject services to each controller constructor
    ClassificationService.$inject     = ['Restangular'];

    // register controllers to Angular
    angular
        .module('app.services')
        .service('ClassificationService', ClassificationService);

})(angular);
