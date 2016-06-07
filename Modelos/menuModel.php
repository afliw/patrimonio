<?php
/**
 * Created by PhpStorm.
 * User: Black
 * Date: 31/5/2016
 * Time: 6:56 PM
 */
$_GET["action"]($_GET["params"]);

function selectClaseItem()
{
    require "../connection.php";
    $db = new PDO('mysql:host=' . $servidor . ';dbname=' . $bd, $usuario, $contrasenia, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $stmt = $db->prepare("SELECT descripcion, id_clase_item FROM ite_clase_item");
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($result);
}