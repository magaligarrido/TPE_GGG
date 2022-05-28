<?php
require_once('./Models/AdminModel.php');
require_once('./Views/LoginAdminView.php');
require_once('./Helpers/SessionHelper.php');

class LoginAdministrativoController{
    private $loginAdminView;
    private $userModel;
    private $sessionHelper;

    function __construct(){
        $this->adminModel = new AdminModel();
        $this->loginAdminView = new LoginAdminView();
        $this->sessionHelper = new SessionHelper();
    }

 

    function login(){
        //$this->sessionHelper->checkLoggedIn();
        $this->loginAdminView->showLoginAdmin();
        //$this->sessionHelper->isLogged()
    }

    function verify(){
        if (!empty($_POST['usuario']) && !empty($_POST['pass'])){
            $usuario = $_POST['usuario'];
            $pass = $_POST['pass'];
            
            
            $usuarioAdministrativo = $this->adminModel->getUser($usuario);
            if ($usuarioAdministrativo && password_verify($pass, ($usuarioAdministrativo->pass))){
                $this->sessionHelper->login($usuarioAdministrativo);             
                $this->sessionHelper->login($usuarioAdministrativo);             
                $this->loginAdminView->showAdminLocation();
            }  
            else{
                $this->loginAdminView->showLoginAdmin('Usuario inexistente');
            }  
        }
        else {
            $this->loginAdminView->showLoginAdmin('Complete el campo Usuario');
        }
    }

    // function register(){

    //     $this->sessionHelper->checkLoggedIn();
    //     $this->loginAdminView->showRegister($this->sessionHelper->isLogged());
        
    // }

    // function verifyRegister(){
    //     if (!empty($_POST['usuario']) && !empty($_POST['pass']) && !empty($_POST['mail'])){

    //         $usuario = $_POST['usuario'];
    //         $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
    //         $mail = $_POST['mail'];

    //         $user = $this->userModel->getUser($usuario);
    //         $session = $this->sessionHelper->isLogged();
            
    //         if ($user){
    //             $this->loginAdminView->showRegister($session,'El usuario ya esta en uso');
    //         }
    //         else{
    //             $this->userModel->newUser($usuario, $mail, $pass);
    //             $this->verify();
    //             //  $this->loginAdminView->showLogin($session,'Cuenta creada! Logea');
    //         }
    //     }else{
    //         $this->loginAdminView->showRegister($this->sessionHelper->isLogged(),'Camplos incompletos');
    
    //     }
    // } 

}