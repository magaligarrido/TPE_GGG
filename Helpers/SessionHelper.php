<?php
class SessionHelper{
    function __construct(){
    }

    function login($user, $rol =""){
        session_start();
        $_SESSION["INSITUCION"] = $user->id_institucion;                
        $_SESSION["USUARIO"] = $user->usuario;
        if($rol){
            $_SESSION["ROL"] = $rol;
        }                
    }

    function logout() {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
        session_destroy();
    }

    function isLogged(){
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
        if (isset($_SESSION['INSITUCION']) && isset($_SESSION["USUARIO"])) {
            return true;
        }else{
            return false;
        }        
    }

    function isAdmin(){
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
        if (isset($_SESSION['ROL']) && ($_SESSION['ROL']== "admin")) {
            return true;
        }else{
            return false;
        }        
    }

    function checkLoggedIn() {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
        if (isset($_SESSION['INSITUCION']) && isset($_SESSION["USUARIO"])) {
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