<?php

require_once 'application/lib/Autoloader.php';

use application\core;
use application\lib;

lib\Autoloader::autoRegister(); //spl_autoload_register
$router = new core\Router();
$dBase = core\DataBase::getInstance();
$dBase->getInfo();

///////////////////////////////////////////////////////
///////////////////Router region///////////////////////
///////////////////////////////////////////////////////

$router->get('/', 'index.mway.php', 'ResponceController.php');
$router->get('/responce', 'responce.mway.php', 'ResponceController.php');
$router->get('/access', 'access.mway.php');

$router->guestRouteCheck();

?>
