<?php

$hostname = 'localhost';

$username = 'root';

$password = '';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=patrimonio", $username, $password);

    $sql = "SELECT * FROM PAT_Tipo_bien";

    $stmt = $dbh->prepare( $sql );

    // execute the query
    $stmt->execute();

    // fetch the results into an array
    $result = $stmt->fetchAll( PDO::FETCH_ASSOC );

 var_dump(json_encode($result)) ;
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>