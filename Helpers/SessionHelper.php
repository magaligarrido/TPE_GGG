<?php
class SessionHelper{
    function __construct(){
    }


   
    function login($id_institucion,$usuario){
        if (session_status() != PHP_SESSION_ACTIVE)   
            session_start();
        $_SESSION["INSITUCION"] = $id_institucion;                
        $_SESSION["USUARIO"] = $usuario;                
        //$_SESSION["rol"] = $user->rol;
    }

    function logout() {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
        session_destroy();
    }

    public function isLogged(){
        if (session_status() != PHP_SESSION_ACTIVE)
           return false;
        return true;
    }
    
    // public function checkLoggedIn() {
    //     if (session_status() != PHP_SESSION_ACTIVE)
    //         session_start();
    //     if (!isset($_SESSION['USUARIO'])) {
    //         header('Location: ' . BASE_URL);
    //         die();
    //     }       
    //     if (!isset($_SESSION['dni'])) {
    //         header('Location: ' . BASE_URL . 'loginPaciente');
    //         die();
    //     }   
    // }

    // function getLoggedUser() {
    //     if (session_status() != PHP_SESSION_ACTIVE)
    //         session_start();
    //     if(isset($_SESSION['DNI']))
    //         return $_SESSION['DNI'];
    // }



    // public function showState(){
    //     if (session_status() != PHP_SESSION_ACTIVE)
    //         session_start();
    //     if (isset($_SESSION['DNI'])){
    //         return "Logout";
    //     }else{
    //         return "Login";
    //     }
        
    // }
    public function showInstitucion(){
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
        if(isset($_SESSION["INSITUCION"])){
            return $_SESSION["INSITUCION"];
        }     
        return;
        
    }

    public function getPaciente(){
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
        if(isset($_SESSION["USUARIO"])){
            return $_SESSION["USUARIO"];
        }   
    }
}