<?php

namespace application\lib;

interface RequirementInt
{
    public static function except($exceptionCode);
    public static function view($viewFile);
    public static function controller($controllerName);
    public static function mvcException($exceptionCode, $problemObject);
}

class Requirement implements RequirementInt
{
    public static function except($exceptionCode)
    {
        switch ($exceptionCode):
            case 404:
                require_once "application/views/excepts/404.mway.php";
                break;
            case 500:
                require_once "application/views/excepts/500.mway.php";
                break;
            case 200:
                require_once "application/views/excepts/200.mway.php";
                break;
        endswitch;
    }

    public static function view($viewFile)
    {
        require_once "application/views/$viewFile";
    }

    public static function controller($controllerName)
    {
        require_once "application/controllers/$controllerName";
    }

    public static function mvcException($exceptionCode, $problemObject)
    {
        switch ($exceptionCode):
            case 600:
                var_dump("$problemObject - controller is not founded");
                break;
            case 700:
                var_dump("$problemObject - model is not founded");
                break;
         endswitch;
    }
}

?>