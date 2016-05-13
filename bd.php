<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli('localhost', 'root', '', 'patrimonio');

$result = $conn->query("SELECT * FROM equipo");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"id":"'  . $rs["id"] . '",';
    $outp .= '"micro":"'   . $rs["micro"]        . '",';
    $outp .= '"disco":"'. $rs["disco"]     . '"}';
    $outp .= '"ram":"'. $rs["ram"]     . '"}';
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);

?>