<link href="//netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/abm.css">

<form  name="userForm" ng-submit="submitForm()" ng-controller="fixabm as lsb">

    <div class="modal-header"><h2 class="modal-title">Agregar Bien</h2></div>

    <!-- Clases -->
    <div class="rcorners" ng-controller="getClases as cla">
        <nav class="site-navigation">
            <ul>
                <li ng-repeat="clase in cla.clases">
                    <button class="btn" ng-click="cla.claseClicked(clase.id, clase.descripcion)">{{clase.descripcion}}</button>
                </li>
            </ul>
        </nav>
    </div>
    <!-- Fin Clases -->

    <!-- Tipo Bien -->
    <div class="form-group rcorners">
        <label>Tipo Bien</label>
        <select class="form-control" ng-model="selected" ng-options="item.id_tipo_item as item.descripcion for item in lsb.tipoItem">
            <option value="">Seleccione {{lsb.clase}}</option>
        </select>
    </div>
    <!-- Fin Tipo Bien -->

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
        <input type="text" name="precio" class="form-control"></input>
    </div>


    <button type="submit" class="btn btn-primary" ng-click="ok()">Aceptar</button>
    <button type="submit" class="btn btn-primary" ng-click="cancel()">Cancelar</button>
</form>