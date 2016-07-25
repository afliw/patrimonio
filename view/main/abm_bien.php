<script src="js/abm.js"></script>
<link rel="stylesheet" href="css/abm.css">

<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.js"></script>
<script src="//angular-ui.github.io/bootstrap/ui-bootstrap-tpls-2.0.0.js"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

<div class="page" ng-app="ABM" xmlns="http://www.w3.org/1999/html">

    <div class="container">

    <div class="col-sm-8 col-sm-offset-2">
        <div class="modal-header"><h2 class="modal-title">Nuevo Expediente</h2></div>
       <div class="form-group rcorners" >
            <label>N° Expediente:</label>
            <input type="text" name="expediente" class="form-control"</input>
            <label>Año:</label>
            <input type="text" name="anio" class="form-control"></input>
            <label>Decreto:</label>
            <input type="text" name="decreto" class="form-control"></input>
            <label>Sector:</label>
            <select name="decreto" class="form-control">
                <option value="">Seleccione...</option>
                <option value="">Test 1</option>
                <option value="">Test 2</option>
            </select>
            <label>Partida:</label>
            <select name="partida" class="form-control">
                <option value="">Seleccione...</option>
                <option value="">Test 1</option>
                <option value="">Test 2</option>
            </select>
            <label>Tipo Aduisición:</label>
            <select name="tipoadqu" class="form-control">
                <option value="">Seleccione...</option>
                <option value="">Test 1</option>
                <option value="">Test 2</option>
            </select>
            <label>Estado:</label>
            <select name="estado" class="form-control">
                <option value="">Seleccione...</option>
                <option value="">Test 1</option>
                <option value="">Test 2</option>
            </select>

        </div>
        <!-- FORM -->
        <!-- Modal -->
        <div ng-controller="ModalCtrl">
            <script type="text/ng-template" id="abm"></script>
            <button type="button" class="btn btn-default" ng-click="open()">Agregar Bien</button>
        </div>
        <!-- Fin Modal -->

        <!--Tabla items-->
        <div ng-controller="getItemsReduce" class="table-responsive">

            <table  st-table="items22" st-safe-src="items2" class="table">
                <thead>
                <tr>
                    <th ng-repeat="column in columns" st-sort="{{column}}">
                        {{column}}
                    </th>
                </tr>
                </thead>

                <tbody>
                <tr ng-repeat="item2 in items22 | filter:search">
                    <td>
                        <div class="btn-group-vertical">
                            <button type="button"  class="btn btn-sm btn-primary">
                                <i class="glyphicon glyphicon-edit"></i>
                            </button>
                            <button type="button"  class="btn btn-sm btn-danger">
                                <i class="glyphicon glyphicon-remove-circle"></i>
                            </button>
                        </div>
                    </td>
                    <td ng-repeat="ite in item2">
                        <img width="50px" ng-if="$index == 0" ng-src="{{ite}}" lazy-src/>
                        <span ng-if="$index != 0 && $index !=3">{{ite}}</span>
                        <span ng-if="$index == 3">{{ite | currency}}</span>
                    </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="5" class="text-center">
                        <div st-pagination="" st-items-by-page="10" st-displayed-pages="30"></div>
                    </td>
                </tr>
                </tfoot>

            </table>
        </div>
        <!--Fin tabla items-->

    </div>
</div>
</div>

<script>
    function myFunction() {
        document.getElementById("main/abm.php").showModal();
    }
</script>