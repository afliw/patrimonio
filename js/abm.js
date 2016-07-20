var app = angular.module("ABM", []);

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


app.controller("leftSideMenu", function($http,$rootScope){
    var self = this;
    this.propiedades = {};
    this.valores = {};
    this.tipoItem = {};

    $rootScope.$on("claseClicked",function(event, id){
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

