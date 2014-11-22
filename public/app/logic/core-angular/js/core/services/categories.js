(function(angular) {

    /**
     * @ngInject
     */
    function CategoryService(Restangular) {
        var serviceRoute = 'categories';

        var restangular = Restangular.withConfig(function(RestangularConfigurer) {
            RestangularConfigurer.setBaseUrl(
                Restangular
                    .configuration
                    .baseUrl + '/' + serviceRoute
            );
        });

        this.getAll = function(params) {
            return restangular
                .one('')
                .get(params);
        };
    }

    // inject services to each controller constructor
    CategoryService.$inject     = ['Restangular'];

    // register controllers to Angular
    angular
        .module('app.services')
        .service('CategoryService', CategoryService);

})(angular);
