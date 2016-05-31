<?php
/**
 * Created by PhpStorm.
 * User: Black
 * Date: 29/5/2016
 * Time: 11:10 PM
 */

$hostname = '192.168.120.9:3306';

$username = 'Fabricio';

$password = 'Sira2013';


    $dbh = new PDO("mysql:host=$hostname;dbname=patrimonio", $username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

    $sql = "SELECT
            Count(ivp.descripcion) AS Cantidad,
            ivp.descripcion AS Valor,
            ip.id_propiedad,
            ip.id_tipo_item
            FROM
            ite_propiedad ip
            INNER JOIN ite_valor_propiedad ivp ON ivp.id_propiedad = ip.id_propiedad
            INNER JOIN aso_item_tprop aso ON aso.id_propiedad = ip.id_propiedad AND aso.id_valor_propiedad = ivp.id_valor_propiedad
            group by 2
            ORDER BY 3";

    $stmt = $dbh->prepare($sql);

    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($result);

?>

