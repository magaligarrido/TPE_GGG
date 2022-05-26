<?php
//DEFINIR BD
// define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

require_once('Controllers/LoginController.php');
require_once('1-Controllers/AdminController.php');
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // accion por defecto si no envian
}

$loginController = new LoginController();
$adminController =  new AdminController();
$params = explode('/', $action);


switch($params[0]){
    case 'Login':
        $loginController->login();
        break;
    case 'Logout':
        $loginController->logout();
        break;
    case 'verify':
        $loginController->verify();
        break;
    case 'registro':
        $loginController->register();
        break;
    case 'verifyregister':
        $loginController->verifyRegister();
        break;   
    case 'admin':
        $adminController->mainAdmin();   
        break;
    default:
        echo('404 Page not found :(');
        break;
}

