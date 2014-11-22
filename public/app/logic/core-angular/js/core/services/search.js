(function(angular) {

    /**
     * @ngInject
     */
    function SearchService(Restangular) {
        var serviceRoute = 'search';

        var restangular = Restangular.withConfig(function(RestangularConfigurer) {
            RestangularConfigurer.setBaseUrl(
                'https://procex.coreproc.ph/api'
                //'https://procex.dev/api'
            );
        });

        this.query = function(params) {
            return Restangular
                .one('query')
                .get(params);
        };
    }

    // inject services to each controller constructor
    SearchService.$inject     = ['Restangular'];

    // register controllers to Angular
    angular
        .module('app.services')
        .service('SearchService', SearchService);

})(angular);
