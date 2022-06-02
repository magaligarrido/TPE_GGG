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
    private $institucion;

    function __construct(){
        $this->adminModel = new AdminModel();
        $this->adminView = new AdminView();
        $this->sessionHelper = new SessionHelper();

        $this->institucion = $this->sessionHelper->showInstitucion();
        $this->medicos = $this->adminModel->getMedicos($this->institucion);
        $this->secretarias = $this->adminModel->getSecretarias($this->institucion);
        $this->especialidades = $this->adminModel->getEspecialidades();

    }

    public function mainAdmin(){
       $this->adminView->showHome($this->adminModel->getMedicos($this->institucion), $this->adminModel->getSecretarias($this->institucion),$this->adminModel->getEspecialidades());
    }

    public function crear_medico(){
        $p=password_hash($_POST["password"], PASSWORD_BCRYPT);
        $this->adminModel->add_m($this->sessionHelper->showInstitucion(),$_POST["usuario"], $p, $_POST["nombre"],$_POST["apellido"], $_POST["id_especialidad"]);
        //----------------------------------------------falta mostrar si se agrego
        $this->adminView->showHome($this->adminModel->getMedicos($this->institucion), $this->adminModel->getSecretarias($this->institucion),$this->adminModel->getEspecialidades());

    }
    
    public function crear_secretaria(){
        $p=password_hash($_POST["password"], PASSWORD_BCRYPT);
        $this->adminModel->add_s($this->sessionHelper->showInstitucion(),$_POST["usuario"], $p, $_POST["nombre"]);
        $this->adminView->showHome($this->adminModel->getMedicos($this->institucion), $this->adminModel->getSecretarias($this->institucion),$this->adminModel->getEspecialidades());
    }

    public function crear_especialidad(){
        if(isset($_POST["especialidad"])){
            $this->adminModel->add_e($_POST["especialidad"]);
            $this->adminView->showHome($this->adminModel->getMedicos($this->institucion), $this->adminModel->getSecretarias($this->institucion),$this->adminModel->getEspecialidades());
        }else{
            $this->adminView->showHome($this->adminModel->getMedicos($this->institucion), $this->adminModel->getSecretarias($this->institucion) ,$this->adminModel->getEspecialidades(), "Ingrese nuevamente la especialidad");
        }
    }
    
    public function relacionar(){
        $m = $this->adminModel->getMedico($_POST["id_medico"]);
        $s = $this->adminModel->getSecretaria($_POST["id_secretaria"]);
    
        if($m && $s){
            $this->adminModel->relacionar($m->id_medico, $s->id_secretaria);
            $this->adminView->showHome($this->adminModel->getMedicos($this->institucion), $this->adminModel->getSecretarias($this->institucion),$this->adminModel->getEspecialidades(), "Relacion Creada");
        }else{
        $this->adminView->showHome($this->adminModel->getMedicos($this->institucion), $this->adminModel->getSecretarias($this->institucion), $this->especialidades,"Hubo un error");
        }
    }
}