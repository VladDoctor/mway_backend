<?php

namespace application\core;

interface DataBaseInt
{
    public static function getInstance();
}


final class DataBase implements DataBaseInt
{
    private static $instance;

    private function __construct()
    {
        try{
            $this->link = new \PDO('mysql:host=localhost;dbname=u0742966_default', 'u0742966_default', '7!RRuV0Y');
        }catch(\PDOException $exception){
            //$this->link = new mysql('127.0.0.1', 'root', '', 'mway');
        }
    }

    public static function getInstance()
    {
        if( self::$instance == NULL ):
            self::$instance = new self;
        endif;

        return self::$instance;
    }

    public function getInfo()
    {
        var_dump($this);
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }
}

?>