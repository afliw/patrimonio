<?php

class Main {
  public static function GetItemTypes($idClase){
    $result = SDB::Read("SELECT
            it.id_tipo_item,
            iti.descripcion,
            COUNT(iti.descripcion) as Cantidad
            FROM
            ite_item it
            INNER JOIN ite_tipo_item iti ON it.id_tipo_item = iti.id_tipo_item
            WHERE it.id_clase_item = $idClase
            group by 2");
    return $result;
  }

  public static function GetProperties(){
    $result = SDB::Read("SELECT
        ip.descripcion AS Propiedad,
        ip.id_propiedad,
        ip.id_tipo_item,
        ip.id_tipo_campo
        FROM
        ite_propiedad AS ip
        GROUP BY 1
        ORDER BY 3");
    return $result;
  }

  public static function GetPropertiesValues(){
    $result = SDB::Read("SELECT
                          Count(ivp.id_valor_propiedad) AS Cantidad,
                          ivp.descripcion AS Valor,
                          ip.id_propiedad,
                          ivp.id_valor_propiedad,
                          ip.id_tipo_item
                          FROM
                          ite_propiedad AS ip
                          INNER JOIN ite_valor_propiedad AS ivp ON ivp.id_propiedad = ip.id_propiedad
                          INNER JOIN aso_item_tprop AS aso ON aso.id_propiedad = ip.id_propiedad AND aso.id_valor_propiedad = ivp.id_valor_propiedad
                          INNER JOIN ite_tipo_item iti ON ip.id_tipo_item = iti.id_tipo_item
                          group by 4
                          ORDER BY 3");
    return $result;
  }

  public static function GetItems($idClase){
    $result = SDB::Read("SELECT
  GROUP_CONCAT(DISTINCT CONCAT(
      'MAX(IF(itp.descripcion = ''',
      itp.descripcion,
      ''', itv.descripcion, NULL)) AS ',
      itp.descripcion
    )
  ) as str
FROM ite_item AS i
INNER JOIN ite_clase_item AS ici ON i.id_clase_item = ici.id_clase_item
INNER JOIN ite_tipo_item AS iti ON i.id_tipo_item = iti.id_tipo_item
INNER JOIN aso_item_tprop AS aso ON aso.id_item = i.id_item
INNER JOIN ite_propiedad AS itp ON itp.id_tipo_item = iti.id_tipo_item AND aso.id_propiedad = itp.id_propiedad
INNER JOIN ite_valor_propiedad itv ON itv.id_propiedad = itp.id_propiedad AND aso.id_valor_propiedad = itv.id_valor_propiedad
WHERE i.id_clase_item = $idClase;");


    $result1 = SDB::Read("SELECT  i.foto as `Foto`,
i.nro_expediente as `Expediente`,
i.decreto as `Decreto`,
i.precio as `Precio`,
i.comentarios as `Comentarios`,
its.descripcion as `Sector`,
ies.descripcion as `Estado`,
ipa.dscripcion as `Partida`, i.id_item, {$result[0]['str']}
FROM ite_item AS i
LEFT JOIN ite_sector AS its ON i.id_sector = its.id_sector
LEFT JOIN ite_estado AS ies ON i.id_estado = ies.id_estado
LEFT JOIN ite_partida AS ipa ON i.id_partida = ipa.id_partida
LEFT JOIN ite_tipo_adquisicion AS ita ON i.id_tipo_adquisicion = ita.id_tipo_adquisicion
LEFT JOIN ite_clase_item AS ici ON i.id_clase_item = ici.id_clase_item
LEFT JOIN ite_tipo_item AS iti ON i.id_tipo_item = iti.id_tipo_item
LEFT JOIN aso_item_tprop AS aso ON aso.id_item = i.id_item
LEFT JOIN ite_propiedad AS itp ON itp.id_tipo_item = iti.id_tipo_item AND aso.id_propiedad = itp.id_propiedad
LEFT JOIN ite_valor_propiedad itv ON itv.id_propiedad = itp.id_propiedad AND aso.id_valor_propiedad = itv.id_valor_propiedad
WHERE i.id_clase_item = $idClase
GROUP BY id_item
UNION ALL
SELECT  i.foto as `Foto`,
i.nro_expediente as `Expediente`,
i.decreto as `Decreto`,
i.precio as `Precio`,
i.comentarios as `Comentarios`,
its.descripcion as `Sector`,
ies.descripcion as `Estado`,
ipa.dscripcion as `Partida`, i.id_item, {$result[0]['str']}  FROM ite_item AS i
RIGHT JOIN ite_sector AS its ON i.id_sector = its.id_sector
RIGHT JOIN ite_estado AS ies ON i.id_estado = ies.id_estado
RIGHT JOIN ite_partida AS ipa ON i.id_partida = ipa.id_partida
RIGHT JOIN ite_tipo_adquisicion AS ita ON i.id_tipo_adquisicion = ita.id_tipo_adquisicion
RIGHT JOIN ite_clase_item AS ici ON i.id_clase_item = ici.id_clase_item
RIGHT JOIN ite_tipo_item AS iti ON i.id_tipo_item = iti.id_tipo_item
RIGHT JOIN aso_item_tprop AS aso ON aso.id_item = i.id_item
RIGHT JOIN ite_propiedad AS itp ON itp.id_tipo_item = iti.id_tipo_item AND aso.id_propiedad = itp.id_propiedad
RIGHT JOIN ite_valor_propiedad itv ON itv.id_propiedad = itp.id_propiedad AND aso.id_valor_propiedad = itv.id_valor_propiedad
WHERE i.id_clase_item = $idClase
GROUP BY id_item");

    return $result1;
  }


	public static function GetItemsReduce($exp){
		$result = SDB::Read("SELECT
		GROUP_CONCAT(DISTINCT CONCAT(
		  'MAX(IF(itp.descripcion = ''',
		  itp.descripcion,
		  ''', itv.descripcion, NULL)) AS ',
		  itp.descripcion
		)
		 ) as str
		FROM ite_item AS i
		INNER JOIN ite_clase_item AS ici ON i.id_clase_item = ici.id_clase_item
		INNER JOIN ite_tipo_item AS iti ON i.id_tipo_item = iti.id_tipo_item
		INNER JOIN aso_item_tprop AS aso ON aso.id_item = i.id_item
		INNER JOIN ite_propiedad AS itp ON itp.id_tipo_item = iti.id_tipo_item AND aso.id_propiedad = itp.id_propiedad
		INNER JOIN ite_valor_propiedad itv ON itv.id_propiedad = itp.id_propiedad AND aso.id_valor_propiedad = itv.id_valor_propiedad
		WHERE i.nro_expediente = 1000"); //"$exp;");

		$result1 = SDB::Read("SELECT    i.foto as `Foto`,
		                                i.precio as `Precio`,  {$result[0]['str']}  , ies.descripcion as `Estado`, i.id_item FROM ite_item AS i
		                                LEFT JOIN ite_estado AS ies ON i.id_estado = ies.id_estado
		                                LEFT JOIN ite_clase_item AS ici ON i.id_clase_item = ici.id_clase_item
		                                LEFT JOIN ite_tipo_item AS iti ON i.id_tipo_item = iti.id_tipo_item
		                                LEFT JOIN aso_item_tprop AS aso ON aso.id_item = i.id_item
		                                LEFT JOIN ite_propiedad AS itp ON itp.id_tipo_item = iti.id_tipo_item AND aso.id_propiedad = itp.id_propiedad
		                                LEFT JOIN ite_valor_propiedad itv ON itv.id_propiedad = itp.id_propiedad AND aso.id_valor_propiedad = itv.id_valor_propiedad
		                                WHERE i.nro_expediente = 1000
		                                GROUP BY id_item
		                                UNION ALL
		                                SELECT  i.foto as `Foto`,
		                                i.precio as `Precio`,  {$result[0]['str']}  , ies.descripcion as `Estado`, i.id_item FROM ite_item AS i
		                                RIGHT JOIN ite_estado AS ies ON i.id_estado = ies.id_estado
		                                RIGHT JOIN ite_clase_item AS ici ON i.id_clase_item = ici.id_clase_item
		                                RIGHT JOIN ite_tipo_item AS iti ON i.id_tipo_item = iti.id_tipo_item
		                                RIGHT JOIN aso_item_tprop AS aso ON aso.id_item = i.id_item
		                                RIGHT JOIN ite_propiedad AS itp ON itp.id_tipo_item = iti.id_tipo_item AND aso.id_propiedad = itp.id_propiedad
		                                RIGHT JOIN ite_valor_propiedad itv ON itv.id_propiedad = itp.id_propiedad AND aso.id_valor_propiedad = itv.id_valor_propiedad
		                                WHERE i.nro_expediente = 1000
		                                GROUP BY id_item");


	return $result1;
	}

	public static function deleteItem($id_item){
		$query = "DELETE FROM ite_item WHERE id_item = ?";
		$res = SDB::EscWrite($query,array($id_item));
		return $res;
	}


}

class Menu {
  public static function GetClases(){
    $result = SDB::Read("SELECT id_clase_item as `id`,descripcion FROM ite_clase_item");
    return $result;
  }
}

