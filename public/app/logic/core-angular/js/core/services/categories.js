(function(angular) {

    /**
     * @ngInject
     */
    function CategoryService(Restangular) {
        var serviceRoute = 'categories';

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
    CategoryService.$inject     = ['Restangular'];

    // register controllers to Angular
    angular
        .module('app.services')
        .service('CategoryService', CategoryService);

})(angular);
