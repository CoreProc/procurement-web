(function(angular) {

    /**
     * @ngInject
     */
    function MapService(Restangular) {
        var serviceRoute = 'data';

        var restangular = Restangular.withConfig(function(RestangularConfigurer) {
            RestangularConfigurer.setBaseUrl(
                'https://procex.coreproc.ph/api'
                //'https://procex.dev/api'
            );
        });

        /*
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
        */

        this.getProvince = function(params) {
            return restangular
                .all('lookup-province')
                .post(params);
        }
    }

    // inject services to each controller constructor
    MapService.$inject     = ['Restangular'];

    // register controllers to Angular
    angular
        .module('app.services')
        .service('MapService', MapService);

})(angular);
