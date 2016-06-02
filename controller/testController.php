<?php

include 'model/test.php';



function index(){
    echo "Test Controller Success!";
}
function asd(){
    $newClass = new test();
    $rows =  $newClass->traerAlgoDesdeLaDb();
    $viewData = array("id" =>5, "datos" => $rows);
    View::Show($viewData);
}

function qwe($a,$b){
    echo "<p>{$a}</p>";
    echo "<p>{$b}</p>";
}

