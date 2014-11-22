(function(angular) {

    /**
     * @ngInject
     */
    function MapService(Restangular) {
        var serviceRoute = 'data';

        var restangular = Restangular.withConfig(function(RestangularConfigurer) {
            RestangularConfigurer.setBaseUrl(
                Restangular
                    .configuration
                    //.baseUrl + '/api/' + serviceRoute
                    .baseUrl
            );
        });

        this.getProvinces = function() {
            return restangular
                .one('data')
                .one('provinces')
                .get();
        };

        this.getRegions = function() {
            return restangular
                .one('data')
                .one('regions')
                .get();
        };
    }

    // inject services to each controller constructor
    MapService.$inject     = ['Restangular'];

    // register controllers to Angular
    angular
        .module('app.services')
        .service('MapService', MapService);

})(angular);
