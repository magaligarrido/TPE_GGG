<?php
require_once('./Models/AdminModel.php');
require_once('./Views/LoginAdminView.php');
require_once('./Helpers/SessionHelper.php');

class LoginAdministrativoController{
    private $loginAdminView;
    private $userModel;
    private $sessionHelper;

    function __construct(){
        $this->userModel = new UserModel();
        $this->loginAdminView = new LoginAdminView();
        $this->sessionHelper = new SessionHelper();
    }

    public function logout(){
        $this->sessionHelper->logout();
        $this->loginAdminView->showLoginAdmin();

    }

    public function login(){
        $this->loginAdminView->showLoginAdmin();
        //$this->sessionHelper->isLogged()
    }

    public function verify(){
        if (!empty($_POST['usuario']) && !empty($_POST['pass'])){
            $usuario = $_POST['usuario'];
            $pass = $_POST['pass'];
            
            
            $usuarioAdministrativo = $this->userModel->getUserADMIN($usuario);
            if ($usuarioAdministrativo && password_verify($pass, ($usuarioAdministrativo->pass))){
                $this->sessionHelper->login($usuarioAdministrativo->id_institucion,$usuarioAdministrativo->usuario);              
                $this->loginAdminView->showAdminLocation();
            }  
            else{
                $this->loginAdminView->showLoginAdmin('Usuario inexistente');
            }  
        }
        else {
            $this->loginAdminView->showLoginAdmin('Complete todos los campos');
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