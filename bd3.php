<?php

$hostname = 'localhost';

$username = 'root';

$password = '';


    $dbh = new PDO("mysql:host=$hostname;dbname=patrimonio", $username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

    $sql = "SELECT descripcion FROM pat_tipo_bien";

    $stmt = $dbh->prepare($sql);

    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($result);

?>