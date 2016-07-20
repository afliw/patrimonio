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

