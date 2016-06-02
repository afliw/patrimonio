<?php

class View {

    public static function Show(){
        $viewName = "";

        $includeHeaderAndFooter = true;
        for($i = 0; $i < func_num_args(); $i++){
            $testArg = func_get_arg($i);
            if(is_string($testArg) && $i == 0){
                $viewName = $testArg;
            }else if(is_bool($testArg)){
                $includeHeaderAndFooter = $testArg;
            }else{
                $_ViewData = $testArg;
            }
        }

        $callTrace = Trace::GetLastMethodCall();
        $viewPath = self::parseViewPath($viewName,$callTrace);
        if(self::verifyView($viewPath)){
            if($includeHeaderAndFooter)
                self::includeHeader();
            include($viewPath);
            if($includeHeaderAndFooter)
                self::includeFooter();
        }else {
          Debug::Out("View <b>$viewPath</b> could not be found.");
          Router::UnknownResource();
        }
    }

    private static function parseViewPath($viewName,$callTrace){
        if(strpos($viewName,"/")){
            return $viewName;
        }else if(strlen($viewName) > 0){
            return self::buildFullViewPath($viewName,self::getControllerName($callTrace["file"]));
        }else{
            return self::buildFullViewPath($callTrace["function"],self::getControllerName($callTrace["file"]));
        }
    }

    private static function buildFullViewPath($viewName,$controllerName){
        return "view/".$controllerName."/".$viewName.".php";
    }

    private static function getControllerName($scriptPath){
        $scriptPath = str_replace("Controller.php","",$scriptPath);
        $sIdx = strrpos($scriptPath,DIRECTORY_SEPARATOR)+1;
        return substr($scriptPath,$sIdx);
    }

    private static function includeHeader(){
        include("view/_public/header.php");
    }

    private static function includeFooter(){
        include("view/_public/footer.php");
    }

    private static function verifyView($viewPath){
        return file_exists($viewPath);
    }

}
