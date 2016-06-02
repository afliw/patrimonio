<?php

class Controller {

    public static function Call($cName,$aName){
        if(!self::includeController($cName,$aName)){
            Debug::Out("Controller <b>$cName</b> or action <b>$aName</b> could not be invoked.");
            return false;
        }
        self::includeModel($cName);
        return self::performAction($aName);
    }

    private static function performAction($aName){
        if(!function_exists($aName)){
          Debug::Out("Function <b>$aName</b> doesn't exist.");
          return false;
        }
        $actionParameters = self::setActionParameters(self::get_function_arguments($aName));
        call_user_func_array($aName,$actionParameters);
        return true;
    }

    private static function includeController($cName,$aName){
        $cFullURI = self::buildControllerFullURI($cName);
        if(!self::verifyController($cFullURI)){
          Debug::Out("Controller <b>$cFullURI</b> doesn't exist.");
          return false;
        }
        include_once($cFullURI);
        return true;
    }

    private static function includeModel($mName){
        $modelPath = "model/{$mName}.php";
        if(file_exists($modelPath))
            include_once($modelPath);
    }

    private static function verifyController($cFullURI){
        return file_exists($cFullURI);
    }

    private static function buildControllerFullURI($cName){
        return "controller/{$cName}Controller.php";
    }

    private static function setActionParameters($actionArgs){
        $parameters = array();
        for($i = 0; $i < count($actionArgs);$i++){
            $parameters[$i] = isset($_REQUEST[$actionArgs[$i]]) ? $_REQUEST[$actionArgs[$i]] : null;
        }
        return $parameters;
    }

    private static function get_function_arguments($fName){
        $f = new ReflectionFunction($fName);
        $args = array();
        foreach ($f->getParameters() as $param) {
            $args[] = $param->name;
        }
        return $args;
    }
}
