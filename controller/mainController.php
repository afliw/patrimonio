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

function selectClaseItem(){
	$itemClasses = Menu::GetItemClasses();
	header('Content-Type: application/json');
	echo json_encode($itemClasses);
}

function getTipoItems($idClase){
	$tiposItem = Main::GetItemTypes($idClase);
	header('Content-Type: application/json');
	echo json_encode($tiposItem);
}

function getItems2($idClase){
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

