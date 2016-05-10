<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Dependecies -->
        <link rel="stylesheet" href="bower_components/angular-material/angular-material.min.css">
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="bower_components/angular/angular.min.js"></script>
        <script src="bower_components/angular-animate/angular-animate.min.js"></script>
        <script src="bower_components/angular-aria/angular-aria.min.js"></script>
        <script src="bower_components/angular-messages/angular-messages.min.js"></script>
        <script src="bower_components/angular-material/angular-material.min.js"></script>
        <!-- Custom Scripts -->
        <script type="text/javascript" src="js/app.js"></script>
    </head>
    <body style="height:100%" ng-app="testingApp">
        <div layout="row" style="height:inherit">
            <div flex style="background-color:red" ng-controller="acController">
                <md-autocomplete md-selected-item="selectedItem" 
                                 md-search-text="searchText" 
                                 md-items="item in getMatches(searchText)" 
                                 md-item-text="item.display"
                                 placeholder="Test Autocomplete" flex>
                <span md-highlight-text="searchText">{{item.display}}</span>
                <md-not-found>
                No matches found.
                </md-not-found>
                </md-autocomplete>
            </div>
            <div flex style="background-color:blue">
                Second item in row
            </div>
            <div flex>
                <div flex>First item in column</div>
                <div flex>Second item in column</div>
            </div>
        </div>
    </body>
    
    
</html>