var app = angular.module("ABM", ['smart-table', 'ngAnimate', 'ui.bootstrap']);

app.controller("getClases", function ($rootScope, $http) {
    var cla = this;
    cla.claseClicked = function(id, clase){
        $rootScope.$broadcast("claseClicked",id, clase);
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

    $scope.$on("claseClicked",function(event, id, clase){
        self.getTipoItems(id, clase);
    });

    this.getTipoItems = function(idClase, clase){
        $http.get('main/getTipoItems?idClase='+idClase).
        then(function (response) {
            self.tipoItem = response.data;
            self.clase = clase;
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
    $rootScope.$on("claseClicked",function(event, id, clase){
        irs.getItemsReduce(id);
        console.log(id);
        console.log(clase);
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

app.controller('ModalCtrl', function ($scope, $uibModal, $log) {

    $scope.animationsEnabled = true;

    $scope.open = function (size) {

        var modalInstance = $uibModal.open({
            animation: $scope.animationsEnabled,
            templateUrl: 'main/abm',
            controller: 'ModalInstanceCtrl',
            //windowTemplateUrl: 'main/abm',
            size: size,
        });


    };

    $scope.toggleAnimation = function () {
        $scope.animationsEnabled = !$scope.animationsEnabled;
    };

});

// Please note that $uibModalInstance represents a modal window (instance) dependency.
// It is not the same as the $uibModal service used above.

app.controller('ModalInstanceCtrl', function ($scope, $uibModalInstance) {


    $scope.ok = function () {
        $uibModalInstance.close();
    };

    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };
});
