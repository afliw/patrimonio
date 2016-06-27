var app = angular.module("MyApp", ['smart-table']);

app.controller("getItems2", function ($scope, $http, $rootScope) {
    var gi2 = this;
    $rootScope.$on("itemClicked",function(event,id){
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
            $scope.columns = Object.keys(response.data[0]);

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

app.controller("leftSideMenu", function($http,$rootScope){
    var self = this;
    this.propiedades = {};
    this.valores = {};
    this.tipoItem = {};

    $rootScope.$on("itemClicked",function(event,id){
        console.log(id);
        self.getTipoItems(id);
    });

    this.getTipoItems = function(idClase){
        $http.get('main/getTipoItems?idClase='+idClase).
        then(function (response) {
            self.tipoItem = response.data;
        }, function (err) {
            console.log(err);
        });
    };

    this.getTipoItems(1);

    $http.get('main/getPropiedades').
    then(function (response) {
        self.propiedades = response.data;
    }, function (err) {
        console.log(err);
    });

    $http.get('main/getValorPropiedades').
    then(function (response) {
        self.valores = response.data;
    }, function (err) {
        console.log(err);
    });
});

