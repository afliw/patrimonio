var app = angular.module("MyApp", []);

app.controller("getItems2", function ($scope, $http, $rootScope) {
    var gi2 = this;
    $rootScope.$on("itemClicked",function(event,id){
        console.log(id);
        gi2.getItems(id);
    });

    this.getItems = function(idClase){
        $http.get('main/getItems2?idClase='+idClase).
        then(function (response) {
            response.data.forEach(function(e){
                e.Foto = "img/"+e.Foto;
            });

            $scope.items2 = [];
            $scope.items2 = response.data;


        }, function (err) {
            console.log(err);
            // log error
        });
    };
    this.getItems(1);
});

app.controller("getTipoItems", function ($scope, $http, $rootScope) {
    var gi3 = this;

    $rootScope.$on("itemClicked",function(event,id){
        console.log(id);
        gi3.getTipoItems(id);
    });

    this.getTipoItems = function(idClase){
        $http.get('main/getTipoItems?idClase='+idClase).
        then(function (response) {
            $scope.tipoItem = response.data;
        }, function (err) {
            console.log(err);
            // log error
        });
    };
    this.getTipoItems(1);
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

