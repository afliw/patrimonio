<script src="js/main.js"></script>

<div class="page" ng-app="MyApp" xmlns="http://www.w3.org/1999/html">

	<header class="site-logo" >
		<div>
			<img ng-src="img/logo.png" alt="Description" width="100px"  />
		</div>
	</header>

	<header class="site-header" >
		<div ng-controller="getClases as cla">
			<nav class="site-navigation">
				<ul>
					<li ng-repeat="clase in cla.clases">
						<a href="" ng-click="cla.claseClicked(clase.id)">{{clase.descripcion}}</a>
					</li>
				</ul>
			</nav>
			<a class="site-navigation" id="link-6" ng-href="main/abm_bien">Nuevo Expediente</a>
		</div>
	</header>

	<aside class="left-sidebar" ng-controller="leftSideMenu as lsb">

		<div class="ac" ng-repeat="item in lsb.tipoItem">

			<input class="ac-input" id="ac-{{item.id_tipo_item}}" name="ac-{{item.id_tipo_item}}" type="checkbox" checked/>
			<label class="ac-label" for="ac-{{item.id_tipo_item}} ">{{item.descripcion}} - ({{item.Cantidad}})</label>

			<article class="ac-text" ng-repeat="propiedad in lsb.propiedades" ng-if="propiedad.id_tipo_item == item.id_tipo_item">
				<div class="ac-sub">
					<input class="ac-input" id="acc-{{propiedad.id_propiedad}}" name="acc-{{propiedad.id_propiedad}}"
					       type="checkbox" checked/>
					<label class="ac-label" for="acc-{{propiedad.id_propiedad}}">{{propiedad.Propiedad}}</label>
					<article class="ac-sub-text" ng-repeat="valor in lsb.valores"
					         ng-if="valor.id_propiedad == propiedad.id_propiedad" ng-model="level3">
						<input type="checkbox"> {{valor.Valor}} - ({{valor.Cantidad}})</input>
					</article>
				</div>
			</article>

		</div>

	</aside>

	<section class="main-content">

		<div ng-controller="getItems" class="table-responsive">

			<form>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-search"></i></div>
						<input type="text" class="inputS" placeholder="buscar..." ng-model="search">
					</div>
				</div>
			</form>


			<table  st-table="items22" st-safe-src="items2" class="table">
				<thead>
				<tr>
					<th> </th>
					<th ng-repeat="column in columns" st-sort="{{column}}">
						{{column}}
					</th>
				</tr>
				</thead>
				<tbody>
				<tr ng-repeat="item in items | filter:search">
					<td>
						<div class="btn-group-vertical">
							<button type="button"  class="btn btn-sm btn-primary">
								<i class="glyphicon glyphicon-edit"></i>
							</button>
							<button type="button"  class="btn btn-sm btn-danger" ng-click="deleteItem(item.id_item)">
								<i class="glyphicon glyphicon-remove-circle"></i>
							</button>
						</div>
					</td>
					<td ng-repeat="(property, value) in item" ng-if="property !== 'id_item'">
						<img width="50px" ng-if="$index == 0" ng-src="{{value}}" lazy-src/>
						<span ng-if="$index != 0 && $index !=3">{{value}}</span>
						<span ng-if="$index == 3">{{value | currency}}</span>
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
	</section>
	<!--<aside class="right-sidebar">  </aside>-->
	<footer class="site-footer"></footer>
</div>
