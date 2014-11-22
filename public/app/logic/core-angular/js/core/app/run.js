(function(angular) {
    angular
        .module('app')
        .run([
            '$rootScope', '$mdSidenav',
            function($rootScope, $mdSidenav) {
                $rootScope.debug = function(str) {
                    console.log(str);
                };

                $rootScope.bounds = {
                    northEast: {
                        lat: 20.332189,
                        lng: 125.1616331
                    },
                    southWest: {
                        lat: 5.751745,
                        lng: 116.525891
                    }
                };

                $rootScope.config = {
                    scrollWheelZoom: false
                };

                $rootScope.regions = [
                    { "name": "ARMM", "provinces": [
                        { "name": "Lanao del Sur" },
                        { "name": "Maguindanao" },
                        { "name": "Sulu" },
                        { "name": "Tawi-Tawi" },
                        { "name": "Basilan" }
                    ]},
                    { "name": "CAR", "provinces": [
                        { "name": "Abra" },
                        { "name": "Apayao" },
                        { "name": "Benguet" },
                        { "name": "Ifugao" },
                        { "name": "Kalinga" },
                        { "name": "Mountain Province" },
                        { "name": "Metro Manila" }
                    ]},
                    { "name": "Region I", "provinces": [
                        { "name": "Ilocos Norte" },
                        { "name": "Ilocos Sur" },
                        { "name": "La Union" },
                        { "name": "Pangasinan" }
                    ]},
                    { "name": "Region II", "provinces": [
                        { "name": "Batanes" },
                        { "name": "Cagayan" },
                        { "name": "Isabela" },
                        { "name": "Nueva Vizcaya" },
                        { "name": "Quirino" }
                    ]},
                    { "name": "Region III", "provinces": [
                        { "name": "Aurora" },
                        { "name": "Bataan" },
                        { "name": "Bulacan" },
                        { "name": "Nueva Ecija" },
                        { "name": "Pampanga" },
                        { "name": "Tarlac" },
                        { "name": "Zambales" }
                    ]},
                    { "name": "Region IV-A", "provinces": [
                        { "name": "Batangas" },
                        { "name": "Cavite" },
                        { "name": "Laguna" },
                        { "name": "Quezon" },
                        { "name": "Rizal" }
                    ]},
                    { "name": "Region IV-B", "provinces": [
                        { "name": "Marinduque" },
                        { "name": "Occidental Mindoro" },
                        { "name": "Oriental Mindoro" },
                        { "name": "Palawan" },
                        { "name": "Romblon" }
                    ]},
                    { "name": "Region IX", "provinces": [
                        { "name": "Zamboanga del Norte" },
                        { "name": "Zamboanga del Sur" },
                        { "name": "Zamboanga Sibugay" }
                    ]},
                    { "name": "Region V", "provinces": [
                        { "name": "Albay" },
                        { "name": "Camarines Norte" },
                        { "name": "Camarines Sur" },
                        { "name": "Catanduanes" },
                        { "name": "Masbate" },
                        { "name": "Sorsogon" }
                    ]},
                    { "name": "Region VI", "provinces": [
                        { "name": "Aklan" },
                        { "name": "Antique" },
                        { "name": "Capiz" },
                        { "name": "Guimaras" },
                        { "name": "Iloilo" },
                        { "name": "Negros Occidental" }
                    ]},
                    { "name": "Region VII", "provinces": [
                        { "name": "Bohol" },
                        { "name": "Cebu" },
                        { "name": "Negros Oriental" },
                        { "name": "Siquijor" }
                    ]},
                    { "name": "Region VIII", "provinces": [
                        { "name": "Biliran" },
                        { "name": "Eastern Samar" },
                        { "name": "Leyte" },
                        { "name": "Northern Samar" },
                        { "name": "Samar" },
                        { "name": "Southern Leyte" }
                    ]},
                    { "name": "Region X", "provinces": [
                        { "name": "Bukidnon" },
                        { "name": "Camiguin" },
                        { "name": "Lanao del Norte" },
                        { "name": "Misamis Occidental" },
                        { "name": "Misamis Oriental" }
                    ]},
                    { "name": "Region XI", "provinces": [
                        { "name": "Compostela Valley" },
                        { "name": "Davao del Norte" },
                        { "name": "Davao del Sur" },
                        { "name": "Davao Occidental" },
                        { "name": "Davao Oriental" }
                    ]},
                    { "name": "Region XII", "provinces": [
                        { "name": "Cotabato" },
                        { "name": "Sarangani" },
                        { "name": "South Cotabato" },
                        { "name": "Sultan Kudarat" }
                    ]},
                    { "name": "Region XIII", "provinces": [
                        { "name": "Agusan del Norte" },
                        { "name": "Agusan del Sur" },
                        { "name": "Dinagat Islands" },
                        { "name": "Surigao del Norte" },
                        { "name": "Surigao del Sur" }
                    ]
                    }
                ];


                $rootScope.cardTest = [];

                for(var i = 0; i < 99; i++) {
                    $rootScope.cardTest.push({ name: 'Hello', budget: 23423432 });
                }

                $rootScope.openLeftMenu = function() {
                    $mdSidenav('asdf').toggle();
                };

                angular.element(function() {
                    angular.element(window).resize();
                });
            }
        ])
    ;
})(angular);
