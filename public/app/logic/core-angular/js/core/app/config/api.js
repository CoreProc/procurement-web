(function(angular) {
    angular
        .module('app')
        .config([
            'RestangularProvider',
            function restangularConfig(RestangularProvider) {
                /*
                RestangularProvider
                    .setBaseUrl('api');
                */
            }
        ])
    ;
})(angular);