<?php

include "class/db.php";

class test {
    //hay que ponerle var o protected o bla para que funque
    var $unaPropiedad;
    
    //faltaba el public para que funcionara el constructor.
    // Ya no importa, hice la clase DB estatica, no hace falta instanciarla.
    public function __construct(){
        
    }
    
    function unMetodo(){
        $this->unaPropiedad = "40";
        return $this->unaPropiedad;
    }
    
    function traerAlgoDesdeLaDb(){
        $rows = DB::read("SELECT * FROM client_info");
        return $rows;
    }

}