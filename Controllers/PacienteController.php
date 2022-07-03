<?php

require_once('./Views/PacienteView.php');
class PacienteController{


    private $sessionHelper;
    private $pacienteView;



    function __construct(){

        $this->pacienteView = new PacienteView();
        $this->sessionHelper = new SessionHelper();


    }

    public function mainPaciente(){
       $this->pacienteView->showPacienteHome();
    }

}