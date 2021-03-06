<?php

class UserModel{
   private $db;
 
   function __construct(){
       $this->db = new PDO('mysql:host=localhost;'.'dbname=turnofacil;charset=utf8', 'root', '');
   }


    public function getUserADMIN($usuario){
        $consulta = $this->db->prepare('SELECT * FROM institucion WHERE usuario = ? ');
        $consulta->execute([$usuario]);
        $user = $consulta->fetch(PDO :: FETCH_OBJ);
        return $user;
   }



   //PACIENTE

   function getUser($dni){
    $consulta = $this->db->prepare('SELECT * FROM paciente WHERE dni = ? ');
    $consulta->execute([$dni]);
    $user = $consulta->fetch(PDO :: FETCH_OBJ);
    return $user;
   }

    function getUsers(){
        $consulta = $this->db->prepare('SELECT * FROM paciente');
        $consulta->execute();
        $users = $consulta->fetchAll(PDO :: FETCH_OBJ);
        return $users;
    }

    function newUser($dni, $nombre,$apellido,$direccion,$telefono,$email,$obraSocial="",$numeroAfiliado=""){
        $consulta = $this->db->prepare('INSERT INTO paciente (dni,nombre,apellido,direccion,telefono,email,obra_social,numero_afiliado) VALUES (?,?,?,?,?,?,?,?)');
        $consulta->execute([$dni, $nombre,$apellido,$direccion,$telefono,$email,$obraSocial,$numeroAfiliado]);
    }
}