(function(angular) {
    angular
        .module('app')
        .config([
            'RestangularProvider',
            function restangularConfig(RestangularProvider) {
                RestangularProvider
                    .setBaseUrl('http://localhost/procurement-web/api');
            }
        ])
    ;
})(angular);