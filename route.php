<?php
//DEFINIR BD
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

require_once('Controllers/LoginAdministrativoController.php');
require_once('Controllers/AdminController.php');
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // accion por defecto si no envian
}

$loginAdministrativoController = new LoginAdministrativoController();
$adminController =  new AdminController();
$params = explode('/', $action);


switch($params[0]){
    case 'home':
        $loginAdministrativoController->login();
        break;
    case 'loginAdministrativo':
        $loginAdministrativoController->login();
        break;
    case 'Logout':
        $loginAdministrativoController->logout();
        break;
    case 'verify-administrador':
        $loginAdministrativoController->verify();
        break;
    /*case 'registro-administrador':
        $loginAdministrativoController->register();
        break;
    case 'verifyregister':
        $loginAdministrativoController->verifyRegister();
        break; */  
    case 'admin':
        $adminController->mainAdmin();   
        break;
    default:
        echo('404 Page not found :(');
        break;
}

