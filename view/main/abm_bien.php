<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
<script src="js/abm.js"></script>

<div class="page" ng-app="ABM" xmlns="http://www.w3.org/1999/html">

    <div class="container">

    <header>
        <div ng-controller="getClases as cla">
            <nav class="site-navigation">
                <ul>
                    <li ng-repeat="clase in cla.clases">
                        <button ng-click="cla.claseClicked(clase.id)">{{clase.descripcion}}</button>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="col-sm-8 col-sm-offset-2" ng-controller="leftSideMenu as lsb">

        <!-- FORM -->
        <form name="userForm" ng-submit="submitForm()">
            <div class="form-group">
                <label>Tipo Bien</label>
                <select ng-model="selected" ng-options="item.id_tipo_item as item.descripcion for item in lsb.tipoItem">
                    <option value="">Seleccione...</option>
                </select>
            </div>

            <div class="form-group" ng-repeat="propiedad in lsb.propiedades"  ng-if="propiedad.id_tipo_item == selected">
               <div ng-switch="propiedad.id_tipo_campo">
                    <div ng-switch-when="1">
                        <label>{{propiedad.Propiedad}}</label>
                        <select >
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
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
</div>