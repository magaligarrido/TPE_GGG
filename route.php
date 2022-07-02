<?php
//DEFINIR BD
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

require_once('Controllers/LoginAdministrativoController.php');
require_once('Controllers/LoginPacienteController.php');
require_once('Controllers/AdminController.php');
require_once('Controllers/PacienteController.php');
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // accion por defecto si no envian
}

$loginAdministrativoController = new LoginAdministrativoController();
$loginPacienteController = new LoginPacienteController();
$adminController =  new AdminController();
$pacienteController =  new PacienteController();
$params = explode('/', $action);


switch($params[0]){
    case 'home':
        $loginAdministrativoController->login();
        break;
    case 'Logout':
        $loginAdministrativoController->logout();
        break;

//--------SECCION ADMINISTRATIVA DE RESPONSABLE DE INSTITUCION
    case 'relacionar':
        $adminController->relacionar();
        break;
    case 'crear_medico':
        $adminController->crear_medico();
        break;
    case 'crear_secretaria':
        $adminController->crear_secretaria();
        break;
    case 'crear_especialidad':
        $adminController->crear_especialidad();
        break;

//----------LOGIN DE ADMINISTRADOR
    case 'loginAdministrativo':
        $loginAdministrativoController->login();
        break;
    case 'verify-administrador':
        $loginAdministrativoController->verify();
        break;
    case 'admin':
        $adminController->mainAdmin();   
        break;

//----------LOGIN Y REGISTRO DE PACIENTES
    case 'loginPaciente':
        $loginPacienteController->login();
        break;
    case 'verify-user':
        $loginPacienteController->verify();
        break;
    case 'registro-paciente':
        $loginPacienteController->register();
        break;
    case 'verifyregister':
        $loginPacienteController->verifyRegister();
        break; 

//---------- SECCION PACIENTE
    case 'paciente' :
        $pacienteController->mainPaciente();
        break;

    default:
        echo('404 Page not found :(');
        break;
}

