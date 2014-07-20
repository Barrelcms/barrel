var app = angular.module('installApp', []);

app.controller('InstallController', ['$scope', '$http',
    function($scope, $http) {

        $scope.beginInstall = function(isValid) {
            if (!isValid) {
                return false;
            }

            $scope.installing = true;

            $scope.installStatus = 'Installing...';

            $http.post('installer', $scope.user).success(function() {
                $scope.installStatus = 'Installation complete.';
                $scope.installed = true;
            });
        };
    }
]);