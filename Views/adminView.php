<?php
include_once('libs\smarty-3.1.39\libs\Smarty.class.php');
class AdminView{
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    public function showHome($medicos, $secretarias ,$especialidades, $error=""){
        $this->smarty->assign('medicos', $medicos);
        $this->smarty->assign('secretarias', $secretarias);
        $this->smarty->assign('especialidades', $especialidades);
        $this->smarty->assign('error', $error);

        $this->smarty->display('./Templates/admin.tpl');
         
    }
}