<?php

//include_once("model/user.php");

function index(){
    login();
}

function login(){
    Header::setTitle("login");
    View::Show();
}

function doLogin($user,$pass){
    header('Content-type: application/json');
    
    $res = User::Login($user,$pass);

    $ret = $res ? $res->id_user : false;
    
    echo json_encode($ret);
    
}