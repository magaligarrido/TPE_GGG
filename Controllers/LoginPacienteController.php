<?php
require_once('./Models/UserModel.php');
require_once('./Views/LoginUserView.php');
require_once('./Helpers/SessionHelper.php');

class LoginPacienteController{
    private $loginUserView;
    private $userModel;
    private $sessionHelper;

    function __construct(){
        $this->userModel = new UserModel();
        $this->loginUserView = new LoginUserView();
        $this->sessionHelper = new SessionHelper();
    }

    function login(){
        if($this->sessionHelper->isLogged()){
            $this->logout();//SI HAY UN LOGIN ACTIVO, LOGOUT
        }else{

            $this->loginUserView->showLoginUser();
        }

    }

    function logout(){
        $this->sessionHelper->logout();
        $this->loginUserView->showLoginUser();
    }

    function verify(){
            $userDNI = $_POST['dni'];  
            $usuario = $this->userModel->getUser($userDNI);

            if ($usuario){
                $this->sessionHelper->login($usuario->id_institucion, $usuario->id_paciente);             
                $this->loginUserView->showUserLocation();
            }  
            else{
                $this->loginUserView->showLoginUser('DNI inexistente');
            }
    }

     function register(){
        $this->loginUserView->showRegistroUser();

    }

    function verifyRegister(){
        if (!empty($_POST['dni']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['direccion'])
         && !empty($_POST['telefono'])&& !empty($_POST['email'])){

            $dni = $_POST['dni'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $mail = $_POST['email'];

            $obraSocial="";
            $numeroAfiliado="";
            if(!empty($_POST['obra_social'])){
                $obraSocial=$_POST['obra_social'];
            }
            if(!empty($_POST['numero_afiliado'])){
                $numeroAfiliado=$_POST['numero_afiliado'];
            }

            $user = $this->userModel->getUser($dni);            
            if ($user){
                $this->loginUserView->showRegistroUser('El DNI ya esta en uso');
            }
            else{
                if($obraSocial && $numeroAfiliado){
                    $this->userModel->newUser($dni, $nombre, $apellido,$direccion,$telefono,$mail,$obraSocial,$numeroAfiliado);
                    $this->verify();
                }
                else{
                    $this->userModel->newUser($dni, $nombre, $apellido,$direccion,$telefono,$mail);
                    $this->verify();
                }
                //  $this->loginUserView->showLogin($session,'Cuenta creada! Logea');
            }
        }else{
            $this->loginUserView->showRegistroUser('Camplos incompletos');

        }
    } 

}