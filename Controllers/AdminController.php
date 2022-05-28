<?php
require_once('./Models/AdminModel.php');
require_once('./Views/adminView.php');
class AdminController{

    private $adminView;
    private $adminModel;
    private $sessionHelper;

    private $secretarias;
    private $medicos;
    private $especialidades;

    function __construct(){
        $this->adminModel = new AdminModel();
        $this->adminView = new AdminView();
        $this->sessionHelper = new SessionHelper();

        $institucion = $this->sessionHelper->showInstitucion();
        $this->medicos = $this->adminModel->getMedicos($institucion);
        $this->secretarias = $this->adminModel->getSecretarias($institucion);
        $this->especialidades = $this->adminModel->getEspecialidades();

    }

    public function mainAdmin(){
       $this->adminView->showHome($this->medicos, $this->secretarias ,$this->especialidades);
    }

    public function crear_medico(){
        $p=password_hash($_POST["password"], PASSWORD_BCRYPT);
        $this->adminModel->add_m($this->sessionHelper->showInstitucion(),$_POST["usuario"], $p, $_POST["nombre"],$_POST["apellido"], $_POST["id_especialidad"]);
        //----------------------------------------------falta mostrar si se agrego
        $this->adminView->showHome($this->medicos, $this->secretarias ,$this->especialidades);

    }
    
    public function crear_secretaria(){
        $p=password_hash($_POST["password"], PASSWORD_BCRYPT);
        $this->adminModel->add_s($this->sessionHelper->showInstitucion(),$_POST["usuario"], $p, $_POST["nombre"]);
        $this->adminView->showHome($this->medicos, $this->secretarias ,$this->especialidades);
    }

    public function crear_especialidad(){
        if(isset($_POST["especialidad"])){
            $this->adminModel->add_e($_POST["especialidad"]);
            $this->adminView->showHome($this->medicos, $this->secretarias ,$this->especialidades);
        }else{
            $this->adminView->showHome($this->medicos, $this->secretarias ,$this->especialidades, "Ingrese nuevamente la especialidad");
        }
    }
    
    public function relacionar(){
        $m = $this->adminModel->getMedico($_POST["id_medico"]);
        $s = $this->adminModel->getSecretaria($_POST["id_secretaria"]);
    
        if($m && $s){
            $this->adminModel->relacionar($m->nombre, $s->id_secretaria);
            $this->adminView->showHome($this->medicos, $this->secretarias ,$this->especialidades, "Relacion Creada");
        }
        $this->adminView->showHome($this->medicos, $this->secretarias ,$this->especialidades,"Hubo un error");
       
    }
}