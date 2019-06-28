<?php

namespace application\core;
use application\lib\Header;
use application\lib\Requirement;

interface RouterInt
{
    public function get($guestRoute, $guestView, $serverController);
    public function guestRouteCheck();
    public function post();
}

class Router implements RouterInt
{
    public $routeArray = array();

    public function __construct()
    {
        $this->path = '/'.$_GET['route'];
    }

    public function guestRouteCheck()
    {
        if(!in_array($this->path, $this->routeArray)){
            Requirement::except(404);
        }
    }

    public function get($guestRoute, $guestView, $serverController=NULL)
    {
        $this->routeArray[] = $guestRoute;

        if( $guestRoute == $this->path ){
            if( file_exists("application/views/$guestView") && ($serverController == NULL) ):
                Requirement::view($guestView);
            elseif( file_exists("application/views/$guestView") && ($serverController != NULL) ):
                try{
                    if( file_exists("application/controllers/$serverController") ):
                        Requirement::controller($serverController);
                        Requirement::view($guestView);
                    else:
                        throw new \Exception($serverController);
                    endif;
                }catch (\Exception $exception){
                    Requirement::mvcException(600, $exception->getMessage());
                }
            else:
                Requirement::except(404);
            endif;
        }else{
            // TODO: 500
        }
    }

    public function post()
    {
        // TODO: Implement post() method.
    }
}


?>