/*global angular*/

var testingApp = angular.module("testingApp",["ngMaterial"]);

var testBatch = [
  {value:0,display:"Cero"},
  {value:1,display:"Uno"},
  {value:2,display:"Dos"},
  {value:3,display:"Tres"}
];

testingApp.controller("acController",["$scope",function($scope){
  //$scope.searchText = "";
  $scope.selectedItem = 0;
  
  $scope.getMatches = function(searchText){
    return testBatch.filter(function(e){
      return e.display.toLowerCase().indexOf(searchText.toLowerCase()) != -1 || e.value == searchText;
    });
  };
}]);
