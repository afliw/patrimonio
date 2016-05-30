var app = angular.module("MyApp", []);

app.controller("getItems2", function($scope, $http) {
    $http.get('bd.php').
        then(function(response) {
        console.log(response.data);
        $scope.items2 = response.data;
        $scope.columns = [{field: 'nro_expediente', displayName: 'N° Expediente'},
                           {field:'decreto', displayName:'Decreto'},
                            {field:'comentarios', displayName:'Comentarios'},
                            {field:'foto', displayName:'Foto'},
                            {field:'descripcion1', displayName:'Sector'},
                            {field:'descripcion2', displayName:'Estado'},
                            {field:'descripcion3', displayName:'Partida'},
                            {field:'descripcion4', displayName:'Clase Item'},
                            {field:'descripcion5', displayName:'Tipo Item'}];

    })/*.
    error(function(response) {
        console.log(response);
        // log error
    });*/
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


app.controller("getTipoItems", function($scope, $http) {
    $http.get('bd4.php').
    success(function(data) {
        console.log(data);
        $scope.tipoItem = data;
    }).
    error(function(data) {
        console.log(data);
        // log error
    });
});

app.controller("getPropiedades", function($scope, $http) {
    $http.get('bd5.php').
    success(function(data) {
        console.log(data);
        $scope.propiedades = data;
    }).
    error(function(data) {
        console.log(data);
        // log error
    });
});