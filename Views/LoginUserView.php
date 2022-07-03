<?php
include_once('libs\smarty-3.1.39\libs\Smarty.class.php');
class LoginUserView{
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showLoginUser( $error=""){

        $this->smarty->assign('titulo', 'Log In Paciente');
        $this->smarty->assign('error', $error);

        $this->smarty->display('./Templates/loginPaciente.tpl');

    }

    function showRegistroUser($error=""){
        $this->smarty->assign('titulo', 'Crear cuenta');
        $this->smarty->assign('error', $error);
        $this->smarty->display('./Templates/registroPaciente.tpl');
    }

    function showUserLocation(){     
        header("Location: ".BASE_URL."paciente");
    }
}