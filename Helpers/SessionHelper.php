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

    function isLogged(){
        if (session_status() != PHP_SESSION_ACTIVE)
           return false;
        return true;
    }

    function checkLoggedIn() {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
        if (isset($_SESSION['DNI'])) {
            header('Location: ' . BASE_URL);
            die();
        }
        session_destroy();       
    }

    function getLoggedUser() {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
        if(isset($_SESSION['DNI']))
            return $_SESSION['DNI'];
    }



    function showState(){
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
        if (isset($_SESSION['DNI'])){
            return "Logout";
        }else{
            return "Login";
        }
        
    }
    function showInstitucion(){
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
        if(isset($_SESSION["INSITUCION"])){
            return $_SESSION["INSITUCION"];
        }     
        return;
        
    }
}