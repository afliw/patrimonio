<script src="js/abm.js"></script>

<link rel="stylesheet" href="css/abm.css">

<div class="page" ng-app="ABM" xmlns="http://www.w3.org/1999/html">

    <div class="container">

    <div class="col-sm-8 col-sm-offset-2" ng-controller="fixabm as lsb">
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
        <form  name="userForm" ng-submit="submitForm()">

            <div class="rcorners" ng-controller="getClases as cla">
                <nav class="site-navigation">
                    <ul>
                        <li ng-repeat="clase in cla.clases">
                            <button class="btn" ng-click="cla.claseClicked(clase.id)">{{clase.descripcion}}</button>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="form-group rcorners">
                <label>Tipo Bien</label>
                <select class="form-control" ng-model="selected" ng-options="item.id_tipo_item as item.descripcion for item in lsb.tipoItem">
                    <option value="">Seleccione...</option>
                </select>
            </div>

                <div class="form-group rcorners">
                   <div ng-repeat="propiedad in lsb.propiedades"  ng-if="propiedad.id_tipo_item == selected"
                        ng-switch="propiedad.id_tipo_campo">
                        <div ng-switch-when="1">
                            <label>{{propiedad.Propiedad}}</label>
                            <select class="form-control">
                                <option value="">Seleccione...</option>
                                <option value="" ng-repeat= "valor in lsb.valores" ng-if="valor.id_propiedad == propiedad.id_propiedad">{{valor.Valor}} </option>
                            </select>
                        </div>
                       <div ng-switch-when="2">
                           <label>{{propiedad.Propiedad}}</label>
                           <input type="text" name="username" class="form-control"></input>
                       </div>
                       <div ng-switch-when="3">
                           <label>{{propiedad.Propiedad}}:</label>
                           <input type="checkbox" value="" ng-repeat= "valor in lsb.valores" ng-if="valor.id_propiedad == propiedad.id_propiedad">{{valor.Valor}} </input>

                       </div>
                    </div>
                    <label>Precio:</label>
                    <input type="text" name="username" class="form-control"></input>
                </div>

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
            <button type="submit" class="btn btn-primary">Aceptar</button>
            <button type="submit" class="btn btn-primary">Cancelar</button>
        </form>
    </div>
</div>
</div>