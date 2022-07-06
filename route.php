<?php
//DEFINIR BD
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

require_once('Controllers/LoginAdministrativoController.php');
require_once('Controllers/AdminController.php');
require_once('Controllers/LoginPacienteController.php');
require_once('Controllers/PacienteController.php');
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // accion por defecto si no envian
}

$loginAdministrativoController = new LoginAdministrativoController();
$adminController =  new AdminController();
$loginPacienteController = new LoginPacienteController();
$pacienteController =  new PacienteController();
$params = explode('/', $action);
$auxMedico="";


switch($params[0]){
    case 'home':
        $loginAdministrativoController->login();
        break;
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
    case 'loginAdministrativo':
        $loginAdministrativoController->login();
        break;
    case 'verify-administrador':
        $loginAdministrativoController->verify();
        break;

    case 'admin':
        $adminController->mainAdmin();   
        break;


        // case 'Logout':
        //     $loginAdministrativoController->logout();
        //     break;
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
    case 'paciente':
        $pacienteController->mainPaciente();
        break;
    // case 'reservar_turno':
    //     if(count($params)>1)
            
    //     break;

    case 'get_turnos_medico':
        if(count($params)==2){
            if($params[1]=='paciente_location')
                $pacienteController->showHomeLocation();
            else{
                if (session_status() != PHP_SESSION_ACTIVE)   
                    session_start();
                if($params[1]!='filtrar_fecha'){
                    $_SESSION["ultimo_medico"] = $params[1];
                    $pacienteController->mostrar_turnos_filtrados($params[1]);
                }else{
                    $pacienteController->mostrar_turnos_filtrados($_SESSION["ultimo_medico"]);
                }
            
            
            }
        }
        //get_turnos_medico/1
        //get_turnos_medico/1/reservar
        //get_turnos_medico/filtrar_fecha
        //get_turnos_medico/filtrar_fecha/reservar
        if(count($params)==3){
                $pacienteController->reservar_turno($params[2]);
          
        } 
        break;


    // case 'get_turnos_medico_fecha' :
    //     $pacienteController->mostrar_turnos_filtrados_xFecha();
    //     break;
    case 'mostrar_medicos_filtrados' :
        $pacienteController->mostrar_medicos_filtrados();
        break;


    case 'cancelar_turno' :
        if(count($params)>1)
            $pacienteController->cancelar_turno($params[1]);
        break;

    case 'paciente_location':
            $pacienteController->showHomeLocation();
        break;

    case 'confirmar_turno' :
        if(count($params)>1)
            $pacienteController->confirmar_turno($params[1]);
        break;



    default:
        echo('404 Page not found :(');
        break;
}

