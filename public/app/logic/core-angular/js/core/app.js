(function(angular) {
    angular
        .module('app', [
            'ngSanitize',
            'ngAnimate',

            'pascalprecht.translate',

            'restangular',
            'ui.router',

            'app.services',
            'app.directives',
            'app.controllers'
        ]);
})(angular);

// @prepros-append "app/config.js"
// @prepros-append "app/run.js"