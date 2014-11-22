(function(angular) {
    angular
        .module('app')
        .run([
            '$rootScope', '$mdSidenav',
            function($rootScope, $mdSidenav) {
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
                        "Lanao del Sur",
                        "Maguindanao",
                        "Sulu",
                        "Tawi-Tawi",
                        "Basilan"
                    ]},
                    { "name": "CAR", "provinces": [
                        "Abra",
                        "Apayao",
                        "Benguet",
                        "Ifugao",
                        "Kalinga",
                        "Mountain Province",
                        "Metro Manila"
                    ]},
                    { "name": "Region I", "provinces": [
                        "Ilocos Norte",
                        "Ilocos Sur",
                        "La Union",
                        "Pangasinan"
                    ]},
                    { "name": "Region II", "provinces": [
                        "Batanes",
                        "Cagayan",
                        "Isabela",
                        "Nueva Vizcaya",
                        "Quirino"
                    ]},
                    { "name": "Region III", "provinces": [
                        "Aurora",
                        "Bataan",
                        "Bulacan",
                        "Nueva Ecija",
                        "Pampanga",
                        "Tarlac",
                        "Zambales"
                    ]},
                    { "name": "Region IV-A", "provinces": [
                        "Batangas",
                        "Cavite",
                        "Laguna",
                        "Quezon",
                        "Rizal"
                    ]},
                    { "name": "Region IV-B", "provinces": [
                        "Marinduque",
                        "Occidental Mindoro",
                        "Oriental Mindoro",
                        "Palawan",
                        "Romblon"
                    ]},
                    { "name": "Region IX", "provinces": [
                        "Zamboanga del Norte",
                        "Zamboanga del Sur",
                        "Zamboanga Sibugay"
                    ]},
                    { "name": "Region V", "provinces": [
                        "Albay",
                        "Camarines Norte",
                        "Camarines Sur",
                        "Catanduanes",
                        "Masbate",
                        "Sorsogon"
                    ]},
                    { "name": "Region VI", "provinces": [
                        "Aklan",
                        "Antique",
                        "Capiz",
                        "Guimaras",
                        "Iloilo",
                        "Negros Occidental"
                    ]},
                    { "name": "Region VII", "provinces": [
                        "Bohol",
                        "Cebu",
                        "Negros Oriental",
                        "Siquijor"
                    ]},
                    { "name": "Region VIII", "provinces": [
                        "Biliran",
                        "Eastern Samar",
                        "Leyte",
                        "Northern Samar",
                        "Samar",
                        "Southern Leyte"
                    ]},
                    { "name": "Region X", "provinces": [
                        "Bukidnon",
                        "Camiguin",
                        "Lanao del Norte",
                        "Misamis Occidental",
                        "Misamis Oriental"
                    ]},
                    { "name": "Region XI", "provinces": [
                        "Compostela Valley",
                        "Davao del Norte",
                        "Davao del Sur",
                        "Davao Occidental",
                        "Davao Oriental"
                    ]},
                    { "name": "Region XII", "provinces": [
                        "Cotabato",
                        "Sarangani",
                        "South Cotabato",
                        "Sultan Kudarat"
                    ]},
                    { "name": "Region XIII", "provinces": [
                        "Agusan del Norte",
                        "Agusan del Sur",
                        "Dinagat Islands",
                        "Surigao del Norte",
                        "Surigao del Sur"
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
            }
        ])
    ;
})(angular);
