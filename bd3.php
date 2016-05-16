<?php

$hostname = 'localhost';

$username = 'root';

$password = '';


    $dbh = new PDO("mysql:host=$hostname;dbname=patrimonio", $username, $password);

    $sql = "SELECT descripcion FROM PAT_Tipo_bien";

    $stmt = $dbh->prepare($sql);

    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);

?>