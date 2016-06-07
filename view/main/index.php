<div class="page" ng-app="MyApp">
	<header class="site-header">
		<div ng-controller="GetItems as gi">
			<nav class="site-navigation">
				<ul>
					<li ng-repeat="item in gi.items">
						<a href="" ng-click="gi.itemClicked(item.id)">{{item.descripcion}}</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>

	<aside class="left-sidebar" ng-controller="getTipoItems">

		<div class="ac" ng-repeat="item in tipoItem" ng-controller="getPropiedades">

			<input class="ac-input" id="ac-{{item.id_tipo_item}}" name="ac-{{item.id_tipo_item}}" type="checkbox"/>
			<label class="ac-label" for="ac-{{item.id_tipo_item}} ">{{item.descripcion}} - ({{item.Cantidad}})</label>

			<article class="ac-text" ng-repeat="propiedad in propiedades"
			         ng-if="propiedad.id_tipo_item == item.id_tipo_item" ng-controller="getValorPropiedades">

				<div class="ac-sub">
					<input class="ac-input" id="acc-{{propiedad.id_propiedad}}" name="acc-{{propiedad.id_propiedad}}"
					       type="checkbox"/>
					<label class="ac-label" for="acc-{{propiedad.id_propiedad}}">{{propiedad.Propiedad}}</label>
					<article class="ac-sub-text" ng-repeat="valor in valores"
					         ng-if="valor.id_propiedad == propiedad.id_propiedad">{{valor.Valor}} - ({{valor.Cantidad}})
					</article>
				</div>

			</article><!--/ac-text-->

		</div><!--/ac-->

		<!--<div class="menu">
		   <ul ng-repeat="item in tipoItem" ng-controller="getPropiedades">
			   <li class="block">
				   <input type="checkbox" name="item{{item.id_tipo_item}}" id="item{{item.id_tipo_item}}" />
				   <label for="item{{item.id_tipo_item}}"><i aria-hidden="true" class="icon-users"></i> {{item.descripcion}} <span>{{item.Cantidad}}</span></label>
				   <ul class="options" ng-repeat="propiedad in propiedades"  ng-if="propiedad.id_tipo_item == item.id_tipo_item" ng-controller="getValorPropiedades">
					   <li>
						   <a href="#"><i aria-hidden="true" class="icon-search"></i> {{propiedad.Propiedad}} </a>
							   <ul  ng-repeat="valor in valores" ng-if="valor.id_propiedad == propiedad.id_propiedad">
								   <li>
									   <a href="#">{{valor.Valor}} - {{valor.Cantidad}} </a>
								   </li>
							   </ul>
					   </li>
				   </ul>
			   </li>
		   </ul>
	   </div>-->

	</aside>

	<section class="main-content">

		<div ng-controller="getItems2" style="overflow-x:auto;">

			<table class="table">

				<thead>
				<tr>
					<th ng-repeat="(key, value) in items2[0]">
						{{key}}
					</th>
				</tr>
				</thead>

				<tbody>
				<tr ng-repeat="item2 in items2">
					<td ng-repeat="(key,value) in item2">
						<img width="50px" ng-if="key == 'Foto'" ng-src="{{value}}" lazy-src/>
						<span ng-if="key != 'Foto'">{{value}}</span>
					</td>
				</tr>
				</tbody>

			</table>

		</div>

	</section>

	<!--<aside class="right-sidebar">  </aside>-->
	<footer class="site-footer"></footer>
</div>