(function(angular) {
    angular
        .module('app', [
            'ngMaterial',
            'leaflet-directive',

            'restangular',

            'app.services',
            'app.directives',
            'app.controllers'
        ]);
})(angular);

// @prepros-append "app/config.js"
// @prepros-append "app/run.js"