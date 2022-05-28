<?php
require_once('./Models/AdminModel.php');
require_once('./Views/adminView.php');
class AdminController{

    private $adminView;
    private $adminModel;
    private $sessionHelper;

    function __construct(){
        $this->adminModel = new AdminModel();
        $this->adminView = new adminView();
        $this->sessionHelper = new SessionHelper();
    }

    public function mainAdmin(){
       $this->adminView->showHome();
    }

    public function crear_medico(){
        $p=password_hash($_POST["password"], PASSWORD_BCRYPT);
       $this->adminModel->add_m($_POST["usuario"], $p, $_POST["nombre"],$_POST["apellido"], $_POST["id_especialidad"]);
       //----------------------------------------------falta mostrar si se agrego
       $this->adminView->showHome();

    }
    
    public function crear_secretaria(){
        $p=password_hash($_POST["password"], PASSWORD_BCRYPT);
        $this->adminModel->add_s($_POST["usuario"], $p, $_POST["nombre"]);
        $this->adminView->showHome();

    }
    
    public function relacionar(){
        $m = $this->adminModel->getMedico($_POST["medico"]);
        $s = $this->adminModel->getSecretaria($_POST["secretaria"]);
    
        if($m && $s){
            $this->adminModel->relacionar($m->nombre, $s->id_secretaria);
            $this->adminView->showHome("Relacion creada");
        }
        $this->adminView->showHome("Hubo un error");
       
    }
}