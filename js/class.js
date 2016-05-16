var app = angular.module("MyApp", []);

app.controller("GetItems", function($scope, $http) {
    $http.get('bd3.php').
    success(function(data, status, headers, config) {
        $scope.items = data;
    }).
    error(function(data, status, headers, config) {
        // log error
    });
});