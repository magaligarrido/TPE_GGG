<?php

class AdminModel{
   private $db;

 
   function __construct(){
       $this->db = new PDO('mysql:host=localhost;'.'dbname=turnofacil;charset=utf8', 'root', '');

   }

   public function getUser($usuario){
    $consulta = $this->db->prepare('SELECT * FROM institucion WHERE usuario = ? ');
    $consulta->execute([$usuario]);
    $user = $consulta->fetch(PDO :: FETCH_OBJ);
    return $user;
   }

   public function add_m($idInstitucion,$u, $p, $n, $a, $idEspecialidad){header('Location: ' . $u.gettype());
    $consulta = $this->db->prepare('INSERT INTO medico(`id_institucion`,`usuario`, `password`, `nombre`, `apellido`, `id_especialidad`) VALUES (?,?,?,?,?,?)');
    $consulta->execute(array($idInstitucion,$u, $p, $n, $a, $idEspecialidad));

   }

   public function add_s($idInstitucion,$u, $p, $n){
    $consulta = $this->db->prepare('INSERT INTO secretaria(`id_institucion`,`usuario`, `password`, `nombre`) VALUES (?,?,?,?)');
    $consulta->execute(array($idInstitucion,$u, $p, $n));
    
   }
   public function add_e($especialidad){
    $consulta = $this->db->prepare('INSERT INTO especialidad(`especialidad`) VALUES (?)');
    $consulta->execute(array($especialidad));
    
   }

   public function getMedico($m){
    $consulta = $this->db->prepare('SELECT * FROM medico WHERE id_medico = ?');
    $consulta->execute(array($m));
    $m = $consulta->fetch(PDO::FETCH_OBJ);
    return $m;
   }

   public function getMedicos($institucion){
    $consulta = $this->db->prepare('SELECT * FROM medico WHERE id_institucion = ?');
    $consulta->execute(array($institucion));
    $m = $consulta->fetchAll(PDO::FETCH_OBJ);
    return $m;
   }

   public function getSecretarias($institucion){
    $consulta = $this->db->prepare('SELECT * FROM secretaria WHERE id_institucion = ?');
    $consulta->execute(array($institucion));
    $s = $consulta->fetchAll(PDO::FETCH_OBJ);
    return $s;
   }

   public function getSecretaria($m){
    $consulta = $this->db->prepare('SELECT * FROM secretaria WHERE id_secretaria = ?');
    $consulta->execute(array($m));
    $m = $consulta->fetch(PDO::FETCH_OBJ);
    return $m;
   }

   public function getEspecialidades(){
    $consulta = $this->db->prepare('SELECT * FROM especialidad');
    $consulta->execute();
    $s = $consulta->fetchAll(PDO::FETCH_OBJ);
    return $s;
   }

   public function relacionar($m, $s){
       $consulta = $this->db->prepare('UPDATE medico SET `id_secretaria`=? WHERE `id_medico` = ?');
       $c=$consulta->execute(array($s, $m));
    }


}