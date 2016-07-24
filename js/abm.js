var app = angular.module("ABM", ['smart-table']);

app.controller("getClases", function ($rootScope, $http) {
    var cla = this;
    cla.claseClicked = function(id){
        $rootScope.$broadcast("claseClicked",id);
    };
    $http.get('main/selectClases').
    then(function (response) {
        cla.clases = response.data;
    }, function (err) {
        console.log(err);
        // log error
    });
});


app.controller("fixabm", function($http,$scope){
    var self = this;
    this.propiedades = {};
    this.valores = {};
    this.tipoItem = {};

    $scope.$on("claseClicked",function(event, id){
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

app.controller("getItemsReduce", function ($scope, $http, $rootScope) {
    var irs = this;
    $rootScope.$on("claseClicked",function(event, id){
        irs.getItemsReduce(id);
        console.log(id);
    });

    this.getItemsReduce = function(exp){
        $http.get('main/getItemsReduce?nroExp='+exp).
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
    this.getItemsReduce(1);
});
