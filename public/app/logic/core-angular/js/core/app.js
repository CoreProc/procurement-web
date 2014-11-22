(function(angular) {
    angular
        .module('app', [
            'ngMaterial',
            'ngAnimate',
            'leaflet-directive',

            'restangular',

            'app.services',
            'app.directives',
            'app.controllers'
        ])
    ;
})(angular);

// @prepros-append "app/run.js"