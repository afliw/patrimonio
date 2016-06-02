<?php
/**
 * Created by PhpStorm.
 * User: TestingVM
 * Date: 2016-06-01
 * Time: 00:43
 */

function index(){
	Header::setTitle("Main");
	View::Show();
}

function selectClaseItem(){
	$itemClasses = Menu::GetItemClasses();
	header('Content-Type: application/json');
	echo json_encode($itemClasses);
}

function getTipoItems(){
	$tiposItem = Main::GetItemTypes();
	header('Content-Type: application/json');
	echo json_encode($tiposItem);
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

function getItems2(){
	$items = Main::GetItems();
	header('Content-Type: application/json');
	echo json_encode($items);
}