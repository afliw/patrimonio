<?php
/**
 * Created by PhpStorm.
 * User: Black
 * Date: 30/5/2016
 * Time: 9:55 PM
 */
$hostname = '192.168.120.9:3306';

$username = 'Fabricio';

$password = 'Sira2013';


$dbh = new PDO("mysql:host=$hostname;dbname=patrimonio", $username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

$sql = "SELECT
        ip.descripcion AS Propiedad,
        ip.id_propiedad,
        ip.id_tipo_item
        FROM
        ite_propiedad AS ip
        GROUP BY 1
        ORDER BY 3";

$stmt = $dbh->prepare($sql);

$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
header('Content-Type: application/json');
echo json_encode($result);

?>


