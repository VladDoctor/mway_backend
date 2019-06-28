<?php

use application\core\ConfigLoader;

trait adminBranch
{
    //adminBranch trait for check ip-addr
}

abstract class guestBranch
{
    protected $apiConfig = 'api-config.ini';
    
    public function __construct()
    {
        $this->dataApiHttp = http_build_query(ConfigLoader::apiConfig());
        $this->authorization();
    }
    
    abstract protected function authorization();
}

class User extends guestBranch
{
     protected function authorization()
     {
         header('Location: https://oauth.vk.com/authorize?'.$this->dataApiHttp);
     }
}

class Admin extends guestBranch
{
    public function authorization()
    {
        // TODO: Implement authorization() method.
    }
}

final class Factory
{
    public static function selectType($guestType)
    {
        if( class_exists($guestType) ):
            return new $guestType;
        else:
            http_response_code(500);
        endif;
    }
}

$guestType = 'User';
$newBranch = Factory::selectType($guestType);

?>