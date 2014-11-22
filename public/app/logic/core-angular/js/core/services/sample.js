(function(angular) {

    /**
     * @ngInject
     */
    function UtilityService(Restangular) {
        var serviceRoute = 'utility';

        var restangular = Restangular.withConfig(function(RestangularConfigurer) {
            RestangularConfigurer.setBaseUrl(
                Restangular
                    .configuration
                    .baseUrl + '/' + serviceRoute
            );
        });

        this.getProvince = function(params) {
            return restangular
                .all('lookup-province')
                .post(params);
        };

        this.getSearch = function(params) {
            return restangular
                .one('search')
                .get(params);
        };
    }

    // inject services to each controller constructor
    UtilityService.$inject     = ['Restangular'];

    // register controllers to Angular
    angular
        .module('app.services')
        .service('UtilityService', UtilityService);

})(angular);
