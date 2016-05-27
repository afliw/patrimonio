<?php

$hostname = 'localhost';

$username = 'root';

$password = '';


$dbh = new PDO("mysql:host=$hostname;dbname=patrimonio", $username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

$sql = "set @aux =CONCAT('',(SELECT CONCAT('select te.descripcion, ',
GROUP_CONCAT(DISTINCT(concat(' sum(case when te.descripcion = \'', te.descripcion, '\' then 1 else 0 end) ', te.descripcion))),', ',
GROUP_CONCAT(DISTINCT(concat(' sum(case when  e.equ_ram = \'', e.equ_ram, '\' then 1 else 0 end) ', e.equ_ram, 'RAM'))), ', ',
GROUP_CONCAT(DISTINCT(concat(' sum(case when e.equ_procesador = \'', e.equ_procesador, '\' then 1 else 0 end) ', e.equ_procesador))),', ',
GROUP_CONCAT(DISTINCT(concat(' sum(case when e.equ_disco_capacidad = \'', e.equ_disco_capacidad, '\' then 1 else 0 end) ', e.equ_disco_capacidad, 'GB'))),', ',
GROUP_CONCAT(DISTINCT(concat(' sum(case when e.equ_monitor_pulgadas = \'', e.equ_monitor_pulgadas, '\' then 1 else 0 end) ', e.equ_monitor_pulgadas, 'p'))),', ',
GROUP_CONCAT(DISTINCT(concat(' sum(case when ti.descripcion = \'', ti.descripcion, '\' then 1 else 0 end) ', ti.descripcion))),', ',
GROUP_CONCAT(DISTINCT(concat(' sum(case when m.descripcion = \'', m.descripcion, '\' then 1 else 0 end) ', m.descripcion))),
' FROM equ_equipo e
LEFT JOIN equ_tipo_equipo te ON e.id_tipo_equipo = te.id_tipo_equipo
LEFT JOIN equ_tipo_impresora ti ON e.id_tipo_impresora = ti.id_tipo_impresora
LEFT JOIN equ_marca m ON e.id_marca = m.id_marca
group by 1')
FROM equ_equipo e
LEFT JOIN equ_tipo_equipo te ON e.id_tipo_equipo = te.id_tipo_equipo
LEFT JOIN equ_tipo_impresora ti ON e.id_tipo_impresora = ti.id_tipo_impresora
LEFT JOIN equ_marca m ON e.id_marca = m.id_marca));
PREPARE stmt_name FROM @aux;
EXECUTE stmt_name;";

$stmt = $dbh->prepare($sql);

$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
header('Content-Type: application/json');
echo json_encode($result);

?>