<link rel="stylesheet" href="css/modal.css">
<script src="js/modal.js"></script>


<div ng-controller="AppCtrl" class="md-padding dialogdemoBasicUsage" id="popupContainer" ng-cloak="" ng-app="MyApp1">
    <p class="inset">
        Open a dialog over the app's content. Press escape or click outside to close the dialog and
        send focus back to the triggering button.
    </p>

    <div class="dialog-demo-content" layout="row" layout-wrap="" layout-margin="" layout-align="center">
        <md-button class="md-primary md-raised" ng-click="showAlert($event)">
            Alert Dialog
        </md-button>
        <md-button class="md-primary md-raised" ng-click="showConfirm($event)">
            Confirm Dialog
        </md-button>
        <md-button class="md-primary md-raised" ng-click="showPrompt($event)">
            Prompt Dialog
        </md-button>
        <md-button class="md-primary md-raised" ng-click="showAdvanced($event)">
            Custom Dialog
        </md-button>
        <md-button class="md-primary md-raised" ng-click="showTabDialog($event)">
            Tab Dialog
        </md-button>
        <md-button class="md-primary md-raised" ng-if="listPrerenderedButton" ng-click="showPrerenderedDialog($event)">
            Pre-Rendered Dialog
        </md-button>
    </div>
    <p class="footer">Note: The <b>Confirm</b> dialog does not use <code>$mdDialog.clickOutsideToClose(true)</code>.</p>
    <div hide-gt-sm="" layout="row" layout-align="center center" flex="">
        <md-checkbox ng-model="customFullscreen" aria-label="Fullscreen Custom Dialog">Force Custom Dialog Fullscreen</md-checkbox>
    </div>

    <div ng-if="status" id="status">
        <b layout="row" layout-align="center center" class="md-padding">
            {{status}}
        </b>
    </div>

    <div class="dialog-demo-prerendered">
        <md-checkbox ng-model="listPrerenderedButton">Show Pre-Rendered Dialog</md-checkbox>
        <p class="md-caption">Sometimes you may not want to compile the dialogs template on each opening.</p>
    </div>


    <div style="visibility: hidden">
        <div class="md-dialog-container" id="myDialog">
            <md-dialog layout-padding="">
                <h2>Pre-Rendered Dialog</h2>
                <p>
                    This is a pre-rendered dialog, which means that <code>$mdDialog</code> doesn't compile its
                    template on each opening.
                    <br><br>
                    The Dialog Element is a static element in the DOM, which is just visually hidden.<br>
                    Once the dialog opens, we just fetch the element from the DOM into our dialog and upon close
                    we restore the element back into its old DOM position.
                </p>
            </md-dialog>
        </div>
    </div>

    <script type="text/ng-template" id="dialog1.tmpl.html"><md-dialog aria-label="Mango (Fruit)"  ng-cloak>
        <form>
            <md-toolbar>
                <div class="md-toolbar-tools">
                    <h2>Mango (Fruit)</h2>
                    <span flex></span>
                    <md-button class="md-icon-button" ng-click="cancel()">
                        <md-icon md-svg-src="img/icons/ic_close_24px.svg" aria-label="Close dialog"></md-icon>
                    </md-button>
                </div>
            </md-toolbar>

            <md-dialog-content>
                <div class="md-dialog-content">
                    <h2>Using .md-dialog-content class that sets the padding as the spec</h2>
                    <p>
                        The mango is a juicy stone fruit belonging to the genus Mangifera, consisting of numerous tropical fruiting trees, cultivated mostly for edible fruit. The majority of these species are found in nature as wild mangoes. They all belong to the flowering plant family Anacardiaceae. The mango is native to South and Southeast Asia, from where it has been distributed worldwide to become one of the most cultivated fruits in the tropics.
                    </p>

                    <img style="margin: auto; max-width: 100%;" alt="Lush mango tree" src="img/mangues.jpg">

                    <p>
                        The highest concentration of Mangifera genus is in the western part of Malesia (Sumatra, Java and Borneo) and in Burma and India. While other Mangifera species (e.g. horse mango, M. foetida) are also grown on a more localized basis, Mangifera indica&mdash;the "common mango" or "Indian mango"&mdash;is the only mango tree commonly cultivated in many tropical and subtropical regions.
                    </p>
                    <p>
                        It originated in Indian subcontinent (present day India and Pakistan) and Burma. It is the national fruit of India, Pakistan, and the Philippines, and the national tree of Bangladesh. In several cultures, its fruit and leaves are ritually used as floral decorations at weddings, public celebrations, and religious ceremonies.
                    </p>
                </div>
            </md-dialog-content>

            <md-dialog-actions layout="row">
                <md-button href="http://en.wikipedia.org/wiki/Mango" target="_blank" md-autofocus>
                    More on Wikipedia
                </md-button>
                <span flex></span>
                <md-button ng-click="answer('not useful')">
                    Not Useful
                </md-button>
                <md-button ng-click="answer('useful')">
                    Useful
                </md-button>
            </md-dialog-actions>
        </form>
        </md-dialog>
    </script><script type="text/ng-template" id="tabDialog.tmpl.html"><md-dialog aria-label="Mango (Fruit)">
        <form>
            <md-toolbar>
                <div class="md-toolbar-tools">
                    <h2>Mango (Fruit)</h2>
                    <span flex></span>
                    <md-button class="md-icon-button" ng-click="cancel()">
                        <md-icon md-svg-src="img/icons/ic_close_24px.svg" aria-label="Close dialog"></md-icon>
                    </md-button>
                </div>
            </md-toolbar>
            <md-dialog-content style="max-width:800px;max-height:810px; ">
                <md-tabs md-dynamic-height md-border-bottom>
                    <md-tab label="one">
                        <md-content class="md-padding">
                            <h1 class="md-display-2">Tab One</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla venenatis ante augue. Phasellus volutpat neque ac dui mattis vulputate. Etiam consequat aliquam cursus. In sodales pretium ultrices. Maecenas lectus est, sollicitudin consectetur felis nec, feugiat ultricies mi.</p>
                        </md-content>
                    </md-tab>
                    <md-tab label="two">
                        <md-content class="md-padding">
                            <h1 class="md-display-2">Tab Two</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla venenatis ante augue. Phasellus volutpat neque ac dui mattis vulputate. Etiam consequat aliquam cursus. In sodales pretium ultrices. Maecenas lectus est, sollicitudin consectetur felis nec, feugiat ultricies mi. Aliquam erat volutpat. Nam placerat, tortor in ultrices porttitor, orci enim rutrum enim, vel tempor sapien arcu a tellus. Vivamus convallis sodales ante varius gravida. Curabitur a purus vel augue ultrices ultricies id a nisl. Nullam malesuada consequat diam, a facilisis tortor volutpat et. Sed urna dolor, aliquet vitae posuere vulputate, euismod ac lorem. Sed felis risus, pulvinar at interdum quis, vehicula sed odio. Phasellus in enim venenatis, iaculis tortor eu, bibendum ante. Donec ac tellus dictum neque volutpat blandit. Praesent efficitur faucibus risus, ac auctor purus porttitor vitae. Phasellus ornare dui nec orci posuere, nec luctus mauris semper.</p>
                            <p>Morbi viverra, ante vel aliquet tincidunt, leo dolor pharetra quam, at semper massa orci nec magna. Donec posuere nec sapien sed laoreet. Etiam cursus nunc in condimentum facilisis. Etiam in tempor tortor. Vivamus faucibus egestas enim, at convallis diam pulvinar vel. Cras ac orci eget nisi maximus cursus. Nunc urna libero, viverra sit amet nisl at, hendrerit tempor turpis. Maecenas facilisis convallis mi vel tempor. Nullam vitae nunc leo. Cras sed nisl consectetur, rhoncus sapien sit amet, tempus sapien.</p>
                            <p>Integer turpis erat, porttitor vitae mi faucibus, laoreet interdum tellus. Curabitur posuere molestie dictum. Morbi eget congue risus, quis rhoncus quam. Suspendisse vitae hendrerit erat, at posuere mi. Cras eu fermentum nunc. Sed id ante eu orci commodo volutpat non ac est. Praesent ligula diam, congue eu enim scelerisque, finibus commodo lectus.</p>
                        </md-content>
                    </md-tab>
                    <md-tab label="three">
                        <md-content class="md-padding">
                            <h1 class="md-display-2">Tab Three</h1>
                            <p>Integer turpis erat, porttitor vitae mi faucibus, laoreet interdum tellus. Curabitur posuere molestie dictum. Morbi eget congue risus, quis rhoncus quam. Suspendisse vitae hendrerit erat, at posuere mi. Cras eu fermentum nunc. Sed id ante eu orci commodo volutpat non ac est. Praesent ligula diam, congue eu enim scelerisque, finibus commodo lectus.</p>
                        </md-content>
                    </md-tab>
                </md-tabs>
            </md-dialog-content>

            <md-dialog-actions layout="row">
                <md-button href="http://en.wikipedia.org/wiki/Mango" target="_blank" md-autofocus>
                    More on Wikipedia
                </md-button>
                <span flex></span>
                <md-button ng-click="answer('not useful')" >
                    Not Useful
                </md-button>
                <md-button ng-click="answer('useful')" style="margin-right:20px;" >
                    Useful
                </md-button>
            </md-dialog-actions>
        </form>
        </md-dialog>
    </script></div>

<!--
Copyright 2016 Google Inc. All Rights Reserved.
Use of this source code is governed by an MIT-style license that can be in foundin the LICENSE file at http://material.angularjs.org/license.
-->