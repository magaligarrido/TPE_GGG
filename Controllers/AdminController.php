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
        if($this->sessionHelper->isLogged()){
            if($this->sessionHelper->isAdmin()){
                $this->adminView->showHome($this->adminModel->getMedicos($this->institucion), $this->adminModel->getSecretarias($this->institucion),$this->adminModel->getEspecialidades());
            }
            else{
                header("Location: ".BASE_URL."home");
            }
        }else{
            header("Location: ".BASE_URL."home");
        }
    }

    public function crear_medico(){
        if($this->sessionHelper->isLogged()){
            if($this->sessionHelper->isAdmin()){
                $nuevoUser =$_POST["usuario"];
                $userMedico = $this->adminModel->getUsuarioMedico($nuevoUser);
                if($userMedico){

                    $this->adminView->showHome($this->adminModel->getMedicos($this->institucion), $this->adminModel->getSecretarias($this->institucion),$this->adminModel->getEspecialidades(), "El usuario para Medico ya existe!");
                }else{
                    $p=password_hash($_POST["password"], PASSWORD_BCRYPT);
                    $this->adminModel->add_m($this->sessionHelper->showInstitucion(),$_POST["usuario"], $p, $_POST["nombre"],$_POST["apellido"], $_POST["id_especialidad"]);
                    //----------------------------------------------falta mostrar si se agrego
                    $this->adminView->showHome($this->adminModel->getMedicos($this->institucion), $this->adminModel->getSecretarias($this->institucion),$this->adminModel->getEspecialidades());
                }
            }
            else{
                header("Location: ".BASE_URL."home");
            }
        }
        else{
            header("Location: ".BASE_URL."home");
        }

    }
    
    public function crear_secretaria(){
        if($this->sessionHelper->isLogged()){
            if($this->sessionHelper->isAdmin()){
                $nuevoUser =$_POST["usuario"];
                $userSecretaria = $this->adminModel->getUsuarioSecretaria($nuevoUser);
                if($userSecretaria){
                    $this->adminView->showHome($this->adminModel->getMedicos($this->institucion), $this->adminModel->getSecretarias($this->institucion),$this->adminModel->getEspecialidades(), "El usuario para Secretaria ya existe!");
                }
                else{
                    $p=password_hash($_POST["password"], PASSWORD_BCRYPT);
                    $this->adminModel->add_s($this->sessionHelper->showInstitucion(),$_POST["usuario"], $p, $_POST["nombre"]);
                    $this->adminView->showHome($this->adminModel->getMedicos($this->institucion), $this->adminModel->getSecretarias($this->institucion),$this->adminModel->getEspecialidades());
                }
            }
            else{
                header("Location: ".BASE_URL."home");
            }
        }
        else{
            header("Location: ".BASE_URL."home");
        }
    }

    public function crear_especialidad(){
        if($this->sessionHelper->isLogged()){
            if($this->sessionHelper->isAdmin()){
                if(isset($_POST["especialidad"])){
                    $nuevaEspecialidad =$_POST["especialidad"];
                    $especialidad = $this->adminModel->getEspecialidad($noevaEspecialidad);

                    if($especialidad){
                        $this->adminView->showHome($this->adminModel->getMedicos($this->institucion), $this->adminModel->getSecretarias($this->institucion),$this->adminModel->getEspecialidades(),"La especialidad ya existe!");
                    }else{
                        $this->adminModel->add_e($_POST["especialidad"]);
                        $this->adminView->showHome($this->adminModel->getMedicos($this->institucion), $this->adminModel->getSecretarias($this->institucion) ,$this->adminModel->getEspecialidades());
                    }
                }
                else{
                    $this->adminView->showHome($this->adminModel->getMedicos($this->institucion), $this->adminModel->getSecretarias($this->institucion) ,$this->adminModel->getEspecialidades(), "Complete el campo con la especialidad");
                }
            }
            else{
                header("Location: ".BASE_URL."home");
            }
        }
        else{
            header("Location: ".BASE_URL."home");
        }
    }

    public function relacionar(){
        if($this->sessionHelper->isLogged()){
            if($this->sessionHelper->isAdmin()){
                $m = $this->adminModel->getMedico($_POST["id_medico"]);
                $s = $this->adminModel->getSecretaria($_POST["id_secretaria"]);
            
                if($m && $s){
                    $this->adminModel->relacionar($m->id_medico, $s->id_secretaria);
                    $this->adminView->showHome($this->adminModel->getMedicos($this->institucion), $this->adminModel->getSecretarias($this->institucion),$this->adminModel->getEspecialidades(), "Relacion Creada");
                }
                else{
                    $this->adminView->showHome($this->adminModel->getMedicos($this->institucion), $this->adminModel->getSecretarias($this->institucion), $this->especialidades,"Hubo un error");
                }
            }
            else{
                header("Location: ".BASE_URL."home");
            }
        }
        else{
            header("Location: ".BASE_URL."home");
        }              
    }
}