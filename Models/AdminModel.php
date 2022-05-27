<?php

class AdminModel{
   private $db;
 
   function __construct(){
       $this->db = new PDO('mysql:host=localhost;'.'dbname=turnofacil;charset=utf8', 'root', '');
   }

   function getUser($usuario){
    $consulta = $this->db->prepare('SELECT * FROM institucion WHERE usuario = ? ');
    $consulta->execute([$usuario]);
    $user = $consulta->fetch(PDO :: FETCH_OBJ);
    return $user;
   }

   /* function getUsers(){
        $consulta = $this->db->prepare('SELECT * FROM usuarios');
        $consulta->execute();
        $users = $consulta->fetchAll(PDO :: FETCH_OBJ);
        return $users;
    }*/

    //SUPONEMOS QUE EL ALTA DE UN USUARIO ADMINISTRADOR LO HACE QUIEN BRINDA EL SERVICIO DE TURNO FACIL
    //TANTO EL ALTA COMO LA BAJA DE ADMINISTRADORES SE DEBERIA REALIZAR DIRECTAMENTE A LA BASE DE DATOS

    // function newUser($dni, $nombre,$apellido,$direccion,$telefono,$email,$obraSocial,$numeroAfiliado){
    //     $consulta = $this->db->prepare('INSERT INTO usuarios (dni,nombre,apellido,direccion,telefono,email,obraSocial,numeroAfiliado) VALUES (?,?,?,?,?,?,?,?)');
    //     $consulta->execute([$dni, $nombre,$apellido,$direccion,$telefono,$email,$obraSocial,$numeroAfiliado]);
    // }

    // function deleteUsuario($dni){
    //     $consulta = $this->db->prepare("DELETE FROM usuarios WHERE dni=?");
    //     $consulta->execute(array($dni));
    // }

}