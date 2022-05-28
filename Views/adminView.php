<?php
include_once('libs\smarty-3.1.39\libs\Smarty.class.php');
class adminView{
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showHome( $error=""){
        $this->smarty->assign('error', $error);

        $this->smarty->display('./Templates/admin.tpl');
         
    }
}