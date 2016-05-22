<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/app2.css">
<script src="bower_components/angular/angular.min.js"></script>
<script type="text/javascript" src="js/class.js"></script>

<body>


<div class="page">
    <header class="site-header" ng-app="MyApp">
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

    <aside class="left-sidebar">
        <div class="ac">

            <input class="ac-input" id="ac-1" name="ac-1" type="checkbox" />
            <label class="ac-label" for="ac-1">Item 1</label>

            <article class="ac-text">

                <div class="ac-sub">
                    <input class="ac-input" id="ac-2" name="ac-2" type="checkbox" />
                    <label class="ac-label" for="ac-2">I love jelly donuts</label>
                </div>

                <div class="ac-sub">
                    <input class="ac-input" id="ac-3" name="ac-3" type="checkbox" />
                    <label class="ac-label" for="ac-3">They are so delicious</label>
                </div>

            </article><!--/ac-text-->

        </div><!--/ac-->



        <div class="ac">

            <input class="ac-input" id="ac-4" name="ac-4" type="checkbox" />
            <label class="ac-label" for="ac-4">Item 2</label>

            <article class="ac-text">

                <div class="ac-sub">
                    <input class="ac-input" id="ac-5" name="ac-5" type="checkbox" />
                    <label class="ac-label" for="ac-5">I also love regular donuts</label>
                </div>

                <div class="ac-sub">
                    <input class="ac-input" id="ac-6" name="ac-6" type="checkbox" />
                    <label class="ac-label" for="ac-6">They are also delicious</label>
                </div>

            </article><!--/ac-text-->

        </div><!--/ac-->
    </aside>
    <section class="main-content"></section>
    <aside class="right-sidebar">




    </aside>
    <footer class="site-footer">Footer</footer>
</div>



</body>
</html>