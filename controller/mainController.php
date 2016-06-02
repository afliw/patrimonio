<?php
/**
 * Created by PhpStorm.
 * User: TestingVM
 * Date: 2016-06-01
 * Time: 00:43
 */

function index(){
	global $a;
	var_dump($a);
	test();
	Header::setTitle("Main");
	View::Show();
}
