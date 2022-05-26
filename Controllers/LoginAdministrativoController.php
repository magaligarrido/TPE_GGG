<?php
require_once('./Models/AdminModel.php');
require_once('./Models/UserModel.php');
require_once('./Views/LoginView.php');
require_once('./Helpers/SessionHelper.php');

class LoginAdministrativoController{
    private $loginView;
    private $userModel;
    private $sessionHelper;

    function __construct(){
        $this->userModel = new UserModel();
        $this->loginView = new LoginView();
        $this->sessionHelper = new SessionHelper();
    }

 

    function login(){
        //$this->sessionHelper->checkLoggedIn();
        $this->loginView->showLogin();
        //$this->sessionHelper->isLogged()
    }

    function verify(){
        if (!empty($_POST['DNI'])){
            $dni = $_POST['DNI'];
     

            $user = $this->userModel->getUser($dni);
            if ($user){
                $this->sessionHelper->login($user);             
                $this->loginView->showHomeLocation();
            }  
            else{
                $this->loginView->showLogin('DNI inexistente');
            }  
        }
        else {
            $this->loginView->showLogin('Ingrese su DNI');
        }
    }

    // function register(){
    //     $this->sessionHelper->checkLoggedIn();
    //     $this->loginView->showRegister($this->sessionHelper->isLogged());
        
    // }

    //    function verifyRegister(){
    //         if (!empty($_POST['usuario']) && !empty($_POST['pass']) && !empty($_POST['mail'])){

    //             $usuario = $_POST['usuario'];
    //             $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
    //             $mail = $_POST['mail'];

    //             $user = $this->userModel->getUser($usuario);
    //             $session = $this->sessionHelper->isLogged();
                
    //             if ($user){
    //                 $this->loginView->showRegister($session,'El usuario ya esta en uso');
    //             }
    //             else{
    //                 $this->userModel->newUser($usuario, $mail, $pass);
    //                 $this->verify();
    //               //  $this->loginView->showLogin($session,'Cuenta creada! Logea');
    //             }
    //         }else{
    //             $this->loginView->showRegister($this->sessionHelper->isLogged(),'Camplos incompletos');
        
    //         }
    //     } 

}