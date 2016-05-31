<!DOCTYPE html>
<html lang="en">
 <link rel="stylesheet" href="css/app2.css">
 <script src="bower_components/angular/angular.min.js"></script>
 <script type="text/javascript" src="js/class.js"></script>

 <body>
 <div class="page" ng-app="MyApp">
  <header class="site-header">
    <div ng-controller="GetItems">
      <nav class="site-navigation">
        <ul>
          <li ng-repeat="item in items">
            <a href="">{{item.descripcion}}</a>
          </li>
        </ul>
      </nav>
    </div>
  </header>

  <aside class="left-sidebar" ng-controller="getTipoItems">

    <div class="ac" ng-repeat="item in tipoItem" ng-controller="getPropiedades">

      <input class="ac-input" id="ac-{{item.id_tipo_item}}" name="ac-{{item.id_tipo_item}}" type="checkbox" checked  />
      <label class="ac-label" for="ac-{{item.id_tipo_item}} ">{{item.descripcion}}  <span>{{item.Cantidad}}</span></label>

      <article class="ac-text" ng-repeat="propiedad in propiedades | groupBy: columns.displayName" >

        <div class="ac-sub"  ng-if="propiedad.id_tipo_item == item.id_tipo_item">
          <input class="ac-input" id="ac-{{propiedad.id_valor_propiedad}}" name="ac-{{propiedad.id_valor_propiedad}}" type="checkbox" />
          <label class="ac-label" for="ac-{{propiedad.id_valor_propiedad}}">{{propiedad.Propiedad }}</label>
          <article class="ac-sub-text">sdfsd</article>
        </div>

      </article><!--/ac-text-->

    </div><!--/ac-->


   </aside>

  <section class="main-content">

    <div  ng-controller="getItems2" style="overflow-x:auto;">

      <table class="table">

        <thead>
          <tr>
            <th ng-repeat="column in columns">
              {{column.displayName}}
            </th>
          </tr>
        </thead>

        <tbody>
          <tr ng-repeat="item2 in items2">
            <td ng-repeat="column in columns">{{item2[column.field]}}</td>
          </tr>
        </tbody>

      </table>

    </div>

  </section>

  <!--<aside class="right-sidebar">  </aside>-->
  <footer class="site-footer"> </footer>
</div>



 </body>
</html>