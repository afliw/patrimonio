var app = angular.module("MyApp", []);

app.controller("GetItems", function ($scope, $http) {
    $http.get('main/selectClaseItem').
    then(function (response) {
        $scope.items = response.data;
    }, function (err) {
        console.log(err);
    });
});

app.controller("getItems2", function ($scope, $http) {
    $http.get('main/getItems2?idClase=1').
    then(
        function (response) {
        $scope.columns = [];
        response.data.forEach(function(e){
            e.Foto = "img/"+e.Foto;
        });
        $scope.items2 = response.data;
    }, function (err) {
        console.log(err);
    });
});



app.controller("getTipoItems", function ($scope, $http) {
    $http.get('main/getTipoItems').
    then(function (response) {
        //console.log(data);
        $scope.tipoItem = response.data;
        $scope.columns = [{field: 'Cantidad', displayName: 'Cantidad'},
            {field: 'ivp.descripcion', displayName: 'Valor'},
            {field: 'ip.descripcion', displayName: 'Propiedad'},
            {field: 'ip.id_propiedad', displayName: 'Id_propiedad'},
            {field: ' ivp.id_valor_propiedad', displayName: 'id_valor'},
            {field: 'ip.id_tipo_item', displayName: 'id_tipo_item'}];
    }, function (err) {
        console.log(err);
    });
});

app.controller("getPropiedades", function ($scope, $http) {
    $http.get('main/getPropiedades').
    then(function (response) {
        //console.log(data);
        $scope.propiedades = response.data;
    }, function (err) {
        console.log(err);
    });
});

app.controller("getValorPropiedades", function ($scope, $http) {
    $http.get('main/getValorPropiedades').
    then(function (response) {
        //console.log(data);
        $scope.valores = response.data;
    }, function (err) {
        console.log(err);
    });
});