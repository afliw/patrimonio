var app = angular.module("MyApp", []);

app.controller("getItems2", function ($scope, $http,$rootScope) {
    var gi2 = this;
    $rootScope.$on("itemClicked",function(event,id){
        console.log(id);
        gi2.getItems(id);
    });

    this.getItems = function(idClase){
        $http.get('main/getItems2?idClase='+idClase).
        then(function (response) {
            $scope.columns = [];
            response.data.forEach(function(e){
                e.Foto = "img/"+e.Foto;
            });
            $scope.items2 = response.data;
            //for(var k in response.data[0]){
            //    $scope.columns.push({field:k,displayName:k});
            //}
        }, function (err) {
            console.log(err);
            // log error
        });
    };
    this.getItems(1);
});

app.controller("GetItems", function ($rootScope, $http) {
    var gi = this;
    gi.itemClicked = function(id){
        $rootScope.$broadcast("itemClicked",id);
    };
    $http.get('main/selectClaseItem').
    then(function (response) {
        gi.items = response.data;
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