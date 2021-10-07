<?php
require './Core/Database.php';
require './Controllers/BaseController.php';
require './Models/BaseModel.php';
//require './SmartyHeader.php';

$controllerName= ucfirst((strtolower($_REQUEST['controller'] ?? 'User')   ). 'Controller');
$actionName= $_REQUEST['action'] ?? 'index';
require "./Controllers/${controllerName}.php";
$controllerObject= new $controllerName;
$controllerObject->$actionName();

?>