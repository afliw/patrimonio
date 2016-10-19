/* global angular*/
var app = angular.module("MyApp", ['ngMaterial','smart-table']);

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

app.controller("getItems", function ($scope, $http, $rootScope, $mdDialog,$mdToast) {
    var gi2 = this;
    this.currentIdClass = 1;
    $rootScope.$on("claseClicked",function(event, id){
        gi2.currentIdClass = id;
        gi2.getItems();
    });

    this.filterId = function(field){
        return field !== "id_item";
    };

    $scope.deleteItem = function(itemId){
        var confirm = $mdDialog.confirm()
            .title('Confirmar')
            .textContent('¿Confirma que desea eliminar este elemento?')
            .ariaLabel('Confirmar')
            .ok('Eliminar')
            .cancel('Cancelar');

        $mdDialog.show(confirm).then(function() {
            $http.get("main/borrarItem?id_item="+itemId).then(function(r){
                if(r.data)
                    $mdToast.show($mdToast.simple().textContent(r.data.message));
                if(r.data.status)
                    gi2.getItems();
            }, function(err){
                console.log(err);
                $mdToast.show($mdToast.simple().textContent("Error de conexión."));
            });

        }, function() {
            console.log("Cancel");
            $mdToast.show($mdToast.simple().textContent('Maraco...'));
        });
    };

    this.getItems = function(){
        $http.get('main/getItems?idClase='+gi2.currentIdClass).
        then(function (response) {
            response.data.forEach(function(e){
                e.Foto = "img/"+e.Foto;
            });
            $scope.items = response.data || [];
            $scope.columns = Object.keys(response.data[0]).filter(gi2.filterId);

        }, function (err) {
            console.log(err);
            // log error
        });
    };
    this.getItems();
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

