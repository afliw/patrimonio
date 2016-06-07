<?php

$hostname = '192.168.120.9';
//test commit
$username = 'Fabricio';

$password = 'Sira2013';


$dbh = new PDO("mysql:host=$hostname;dbname=patrimonio", $username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

$sql = "SELECT
i.foto,
i.nro_expediente,
i.decreto,
i.precio,
i.comentarios,
its.descripcion as descripcion1,
ies.descripcion as descripcion2,
ipa.dscripcion as descripcion3,
ici.descripcion as descripcion4,
iti.descripcion as descripcion5
FROM
ite_item i
INNER JOIN ite_sector its ON i.id_sector = its.id_sector
INNER JOIN ite_estado ies ON i.id_estado = ies.id_estado
INNER JOIN ite_partida ipa ON i.id_partida = ipa.id_partida
INNER JOIN ite_tipo_adquisicion ita ON i.id_tipo_adquisicion = ita.id_tipo_adquisicion
INNER JOIN ite_clase_item ici ON i.id_clase_item = ici.id_clase_item
INNER JOIN ite_tipo_item iti ON i.id_tipo_item = iti.id_tipo_item";

$stmt = $dbh->prepare($sql);

$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
header('Content-Type: application/json');
echo json_encode($result);

?>
