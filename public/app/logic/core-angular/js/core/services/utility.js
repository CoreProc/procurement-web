(function(angular) {

    /**
     * @ngInject
     */
    function UtilityService(Restangular) {
        var serviceRoute = 'utility';

        var restangular = Restangular.withConfig(function(RestangularConfigurer) {
            RestangularConfigurer.setBaseUrl(
                'https://procex.coreproc.ph/api/' + serviceRoute
                //'https://procex.dev/api/' + serviceRoute
            );
        });

        this.getProvince = function(params) {
            return restangular
                .all('lookup-province')
                .post(params);
        };

        this.getSearch = function(criteria, query) {
            return restangular
                .one('search')
                .one(criteria)
                .one(query)
                .get();
        };
    }

    // inject services to each controller constructor
    UtilityService.$inject     = ['Restangular'];

    // register controllers to Angular
    angular
        .module('app.services')
        .service('UtilityService', UtilityService);

})(angular);
