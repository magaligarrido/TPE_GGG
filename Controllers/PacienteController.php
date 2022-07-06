<?php

require_once('./Views/PacienteView.php');
require_once('./Models/PacienteModel.php');
class PacienteController{


    private $sessionHelper;
    private $pacienteView;
    private $pacienteModel;



    function __construct(){

        $this->pacienteView = new PacienteView();
        $this->sessionHelper = new SessionHelper();
        $this->pacienteModel = new PacienteModel();


    }

    public function mainPaciente(){
        $paciente = $this->sessionHelper->getPaciente();
        $turnos = $this->pacienteModel->getTurnos($paciente);
        $this->pacienteView->showPacienteHome($turnos);
    }

    public function showHomeLocation(){
        $this->pacienteView->showPacienteLocation();
    }

    public function mostrar_medicos_filtrados(){
        if(empty($_POST["especialidad"]) || empty($_POST["obra_social"])){
            $paciente = $this->sessionHelper->getPaciente();
        $turnos = $this->pacienteModel->getTurnos($paciente);
        $this->pacienteView->showPacienteHome("no se ingresaron datos");
        }

        $medicos = $this->pacienteModel->mostrar_medicos_filtrados($_POST["obra_social"], $_POST["especialidad"]);

        $this->pacienteView->mostrar_medicos_filtrados($medicos);
     }

    public function mostrar_turnos_filtrados($medico){
        if(!empty($_POST['dia']) && !empty($_POST['hora'])){
            if($_POST['hora']=="am")
                $turnos = $this->pacienteModel->mostrar_turnos_filtrados_manana($medico, $_POST['dia']);
                else
                $turnos = $this->pacienteModel->mostrar_turnos_filtrados_tarde($medico, $_POST['dia']);

        }
        else 
            $turnos = $this->pacienteModel->mostrar_turnos_filtrados($medico);

        $this->pacienteView->mostrar_turnos_filtrados($turnos);
     }

    public function reservar_turno($turno){
        $id_paciente = $this->sessionHelper->getPaciente();
        $datosPaciente = $this->pacienteModel->getPaciente($id_paciente);
        if($datosPaciente->nombre ==  $_POST["nombre"] && 
            $datosPaciente->apellido == $_POST["apellido"] && 
            $datosPaciente->direccion == $_POST["direccion"] && 
            $datosPaciente->telefono ==  $_POST["tel"] &&
            $datosPaciente->email == $_POST["email"] && 
            $datosPaciente->obra_social == $_POST["os"] &&
            $datosPaciente->numero_afiliado == $_POST["n_afiliado"]){
                
                $this->pacienteModel->reservar_turno($id_paciente, $turno);
                $this->pacienteView->showPacienteLocation();
        }else{
           echo '<script type="text/javascript">alert("datos incorrectos")</script>';
            header('Location:' . BASE_URL . 'home');
    }
         
     }


    public function cancelar_turno($turno){
        $this->pacienteModel->cancelar_turno($turno);
        $this->pacienteView->showPacienteLocation();//mostrar turnos
     }
    public function confirmar_turno($turno){
        $this->pacienteModel->confirmar_turno($turno);
        $this->pacienteView->showPacienteLocation();//mostrar turnos
     }
     

}