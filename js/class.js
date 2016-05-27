var app = angular.module("MyApp", []);



app.controller('mainController', function($scope) {

    // create the list of sushi rolls 
    $scope.sushi = [
        { name: 'Cali Roll', fish: 'Crab', tastiness: 2 },
        { name: 'Philly', fish: 'Tuna', tastiness: 4 },
        { name: 'Tiger', fish: 'Eel', tastiness: 7 },
        { name: 'Rainbow', fish: 'Variety', tastiness: 6 }
    ];

});

app.controller("GetItems", function($scope, $http) {
    $http.get('bd3.php').
    success(function(data) {
        console.log(data);
        $scope.items = data;
    }).
    error(function(data) {
        console.log(data);
        // log error
    });
});
