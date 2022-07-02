<?php
include_once('libs\smarty-3.1.39\libs\Smarty.class.php');
class LoginAdminView{
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    public function showLoginAdmin( $error=""){
      
        $this->smarty->assign('titulo', 'Log In Admin');
        $this->smarty->assign('error', $error);

        $this->smarty->display('./Templates/login.tpl');
         
    }

    public function showAdminLocation(){     
        header("Location: ".BASE_URL."admin");
    }
}