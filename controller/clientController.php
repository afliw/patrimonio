<?php


function getAll(){
    header('Content-type: application/json');
    $clients = Client::GetAll();
    echo json_encode($clients);
}


// Ej Update: $.post("/client/save",{clientData: {id:1,name:"afliw"}},function(d){console.log(d);})
// Ej Insert: $.post("/client/save",{clientData: {name:"afliw",lastname:"wilfa",status:1}},function(d){console.log(d);})
function save($clientData){
    $client = new Client($clientData);
    $res = $client->Update();
    echo json_encode(array($res));
}