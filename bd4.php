<?php
/**
 * Created by PhpStorm.
 * User: Black
 * Date: 29/5/2016
 * Time: 9:22 PM
 */

$hostname = '192.168.120.9:3306';

$username = 'Fabricio';

$password = 'Sira2013';


    $dbh = new PDO("mysql:host=$hostname;dbname=patrimonio", $username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

    $sql = "SELECT
            it.id_tipo_item,
            iti.descripcion,
            COUNT(iti.descripcion) as Cantidad
            FROM
            ite_item it
            INNER JOIN ite_tipo_item iti ON it.id_tipo_item = iti.id_tipo_item
            group by 2";

    $stmt = $dbh->prepare($sql);

    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($result);

?>
