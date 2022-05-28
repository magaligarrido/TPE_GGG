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

   function add_m($idInstitucion,$u, $p, $n, $a, $idEspecialidad){
    $consulta = $this->db->prepare('INSERT INTO medico(`id_institucion`,`usuario`, `password`, `nombre`, `apellido`, `id_especialidad`) VALUES (?,?,?,?,?,?)');
    $consulta->execute(array($idInstitucion,$u, $p, $n, $a, $idEspecialidad));

   }

   function add_s($idInstitucion,$u, $p, $n){
    $consulta = $this->db->prepare('INSERT INTO secretaria(`id_institucion`,`usuario`, `password`, `nombre`) VALUES (?,?,?,?)');
    $consulta->execute(array($idInstitucion,$u, $p, $n));
    
   }
   function add_e($especialidad){
    $consulta = $this->db->prepare('INSERT INTO especialidad(`especialidad`) VALUES (?)');
    $consulta->execute(array($especialidad));
    
   }

   function getMedico($m){
    $consulta = $this->db->prepare('SELECT * FROM medico WHERE nombre = ?');
    $consulta->execute(array($m));
    $m = $consulta->fetch(PDO::FETCH_OBJ);
    return $m;
   }

   function getMedicos($institucion){
    $consulta = $this->db->prepare('SELECT * FROM medico WHERE id_institucion = ?');
    $consulta->execute(array($institucion));
    $m = $consulta->fetchAll(PDO::FETCH_OBJ);
    return $m;
   }

   function getSecretarias($institucion){
    $consulta = $this->db->prepare('SELECT * FROM secretaria WHERE id_institucion = ?');
    $consulta->execute(array($institucion));
    $s = $consulta->fetchAll(PDO::FETCH_OBJ);
    return $s;
   }

   function getSecretaria($m){
    $consulta = $this->db->prepare('SELECT * FROM medico WHERE nombre = ?');
    $consulta->execute(array($m));
    $m = $consulta->fetch(PDO::FETCH_OBJ);
    return $m;
   }

   function getEspecialidades(){
    $consulta = $this->db->prepare('SELECT * FROM especialidad');
    $consulta->execute();
    $s = $consulta->fetchAll(PDO::FETCH_OBJ);
    return $s;
   }

   function relacionar($m, $s){
       $consulta = $this->db->prepare('UPDATE medico SET `secretaria`=? WHERE `nombre` = ?');
       $c=$consulta->execute(array($s, $m));
    }


}