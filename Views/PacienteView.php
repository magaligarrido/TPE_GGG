<?php
include_once('libs\smarty-3.1.39\libs\Smarty.class.php');
class PacienteView{
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showPacienteHome($turnos,  $error=""){

        $this->smarty->assign('error', $error);
        $this->smarty->assign('turnos', $turnos);

        $this->smarty->display('./Templates/paciente.tpl');

    }

    function mostrar_medicos_filtrados($medicos,  $error=""){

        $this->smarty->assign('error', $error);
        $this->smarty->assign('medicos', $medicos);

        $this->smarty->display('./Templates/mostrar_medicos_filtrados.tpl');

    }
    
    function mostrar_turnos_filtrados($turnos,  $error=""){

        $this->smarty->assign('error', $error);
        $this->smarty->assign('turnos', $turnos);

        $this->smarty->display('./Templates/mostrar_turnos_filtrados.tpl');

    }
    public function showPacienteLocation(){     
        header("Location: ".BASE_URL."paciente");
    }
    
}