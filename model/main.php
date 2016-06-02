<?php

class Main {
  public static function GetItemTypes(){
    $result = SDB::Read("SELECT
            it.id_tipo_item,
            iti.descripcion,
            COUNT(iti.descripcion) as Cantidad
            FROM
            ite_item it
            INNER JOIN ite_tipo_item iti ON it.id_tipo_item = iti.id_tipo_item
            group by 2");
    return $result;
  }

  public static function GetProperties(){
    $result = SDB::Read("SELECT
        ip.descripcion AS Propiedad,
        ip.id_propiedad,
        ip.id_tipo_item
        FROM
        ite_propiedad AS ip
        GROUP BY 1
        ORDER BY 3");
    return $result;
  }

  public static function GetPropertiesValues(){
    $result = SDB::Read("SELECT
            Count(ivp.descripcion) AS Cantidad,
            ivp.descripcion AS Valor,
            ip.id_propiedad,
            ip.id_tipo_item
            FROM
            ite_propiedad ip
            INNER JOIN ite_valor_propiedad ivp ON ivp.id_propiedad = ip.id_propiedad
            INNER JOIN aso_item_tprop aso ON aso.id_propiedad = ip.id_propiedad AND aso.id_valor_propiedad = ivp.id_valor_propiedad
            group by 2
            ORDER BY 3");
    return $result;
  }

  public static function GetItems(){
    $result = SDB::Read("SELECT
              i.foto as `Foto`,
              i.nro_expediente as `N° Expediente`,
              i.decreto as `Decreto`,
              --i.precio as `Precio`,
              i.comentarios as `Comentarios`,
              its.descripcion as `Sector`,
              ies.descripcion as `Estado`,
              ipa.dscripcion as `Partida`,
              ici.descripcion as `Clase Item`,
              iti.descripcion as `Tipo Item`
              FROM
              ite_item i
              INNER JOIN ite_sector its ON i.id_sector = its.id_sector
              INNER JOIN ite_estado ies ON i.id_estado = ies.id_estado
              INNER JOIN ite_partida ipa ON i.id_partida = ipa.id_partida
              INNER JOIN ite_tipo_adquisicion ita ON i.id_tipo_adquisicion = ita.id_tipo_adquisicion
              INNER JOIN ite_clase_item ici ON i.id_clase_item = ici.id_clase_item
              INNER JOIN ite_tipo_item iti ON i.id_tipo_item = iti.id_tipo_item");
    return $result;
  }
}

class Menu {
  public static function GetItemClasses(){
    $result = SDB::Read("SELECT descripcion FROM ite_clase_item");
    return $result;
  }
}

