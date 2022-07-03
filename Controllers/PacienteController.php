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
        
       $this->pacienteView->showPacienteHome();
    }

    public function mostrar_medicos_filtrados(){
        if(!(!empty($_POST["especialidad"]) && !empty($_POST["obra_social"])))
            $this->pacienteView->showPacienteHome("no se ingresaron datos");

        $medicos = $this->pacienteModel->mostrar_medicos_filtrados($_POST["obra_social"], $_POST["especialidad"]);

        $this->pacienteView->mostrar_medicos_filtrados($medicos);
     }

    public function mostrar_turnos_filtrados($medico){
        $turnos = $this->pacienteModel->mostrar_turnos_filtrados($medico);

        $this->pacienteView->mostrar_turnos_filtrados($turnos);
     }

    public function reservar_turno($turno){
        $paciente = $this->sessionHelper->getPaciente();
        $this->pacienteModel->reservar_turno($paciente, $turno);
        $this->pacienteView->showPacienteLocation("Turno reservado con exito");
     }
     

}