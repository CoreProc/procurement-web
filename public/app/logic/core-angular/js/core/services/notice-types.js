(function(angular) {

    /**
     * @ngInject
     */
    function NoticeTypeService(Restangular) {
        var serviceRoute = 'notice-types';

        var restangular = Restangular.withConfig(function(RestangularConfigurer) {
            RestangularConfigurer.setBaseUrl(
                'https://procex.coreproc.ph'
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
    NoticeTypeService.$inject     = ['Restangular'];

    // register controllers to Angular
    angular
        .module('app.services')
        .service('NoticeTypeService', NoticeTypeService);

})(angular);
