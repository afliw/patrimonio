var app = angular.module("MyApp", []);

app.controller("getItems2", function ($scope, $http) {
    $http.get('main/getItems2').
    then(function (response) {
        //console.log(response.data);
        response.data.forEach(function(e){
            e.foto = "img/"+e.foto;
        });
        $scope.items2 = response.data;
        $scope.columns = [{field: 'foto', displayName: 'Foto'},
            {field: 'nro_expediente', displayName: 'N° Expediente'},
            {field: 'decreto', displayName: 'Decreto'},
            {field: 'comentarios', displayName: 'Comentarios'},
            {field: 'descripcion1', displayName: 'Sector'},
            {field: 'descripcion2', displayName: 'Estado'},
            {field: 'descripcion3', displayName: 'Partida'},
            {field: 'descripcion4', displayName: 'Clase Item'},
            {field: 'descripcion5', displayName: 'Tipo Item'}];

    }, function (err) {
        console.log(err);
        // log error
    });
});

app.controller("GetItems", function ($scope, $http) {
    $http.get('main/selectClaseItem').
    then(function (response) {
        $scope.items = response.data;
    }, function (err) {
        console.log(err);
        // log error
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
        // log error
    });
});

app.controller("getPropiedades", function ($scope, $http) {
    $http.get('main/getPropiedades').
    then(function (response) {
        //console.log(data);
        $scope.propiedades = response.data;
    }, function (err) {
        console.log(err);
        // log error
    });
});

app.controller("getValorPropiedades", function ($scope, $http) {
    $http.get('main/getValorPropiedades').
    then(function (response) {
        //console.log(data);
        $scope.valores = response.data;
    }, function (err) {
        console.log(err);
        // log error
    });
});