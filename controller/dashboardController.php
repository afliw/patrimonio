<?php

function index(){
    Header::setTitle("Dashboard");
    View::Show();
}

function test(){
    View::Show(false);
}