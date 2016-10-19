<?php
/**
 * Created by PhpStorm.
 * User: TestingVM
 * Date: 2016-06-01
 * Time: 00:43
 */

function index(){
	Header::setTitle("Patrimonio");
	View::Show();
}

function login(){
	Header::setTitle("Login");
	View::Show();
}

function abm_bien(){
	Header::setTitle("ABM");
	View::Show();
}

function abm(){
	Header::setTitle("ABM Individual");
	View::Show();
}

function selectClases(){
	$clases = Menu::GetClases();
	header('Content-Type: application/json');
	echo json_encode($clases);
}

function getTipoItems($idClase){
	$tiposItem = Main::GetItemTypes($idClase);
	header('Content-Type: application/json');
	echo json_encode($tiposItem);
}

function getItems($idClase){
	$items = Main::GetItems($idClase);
	header('Content-Type: application/json');
	echo json_encode($items);
}

function getItemsReduce($exp){
	$items = Main::GetItemsReduce($exp);
	header('Content-Type: application/json');
	echo json_encode($items);
}

function getPropiedades(){
	$properties = Main::GetProperties();
	header('Content-Type: application/json');
	echo json_encode($properties);
}

function getValorPropiedades(){
	$propertiesValues = Main::GetPropertiesValues();
	header('Content-Type: application/json');
	echo json_encode($propertiesValues);
}

function borrarItem($id_item){
	if (!isset($id_item) || !is_numeric($id_item)) JSONResponse::Set(false,"No hay ID o es incorrecto")->Send(true);
	$res = Main::deleteItem($id_item);
	JSONResponse::Set(!!$res, !!$res ? "Item borrado correctamente." : "Error al escribir en base de datos.")->Send();

}
