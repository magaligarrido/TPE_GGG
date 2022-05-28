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

   function add_m($u, $p, $n, $a, $id){
    $consulta = $this->db->prepare('INSERT INTO medico(`usuario`, `password`, `nombre`, `apellido`, `id_especialidad`) VALUES (?,?,?,?,?)');
    $consulta->execute(array($u, $p, $n, $a, $id));

   }

   function add_s($u, $p, $n){
    $consulta = $this->db->prepare('INSERT INTO secretaria(`usuario`, `password`, `nombre`) VALUES (?,?,?)');
    $consulta->execute(array($u, $p, $n));
    
   }

   function getMedico($m){
    $consulta = $this->db->prepare('SELECT * FROM medico WHERE nombre = ?');
    $consulta->execute(array($m));
    $m = $consulta->fetch(PDO::FETCH_OBJ);
    return $m;
   }

   function getSecretaria($s){
    $consulta = $this->db->prepare('SELECT * FROM secretaria WHERE nombre = ?');
    $consulta->execute(array($s));
    $s = $consulta->fetch(PDO::FETCH_OBJ);
    return $s;
   }

   function relacionar($m, $s){
       $consulta = $this->db->prepare('UPDATE medico SET `secretaria`=? WHERE `nombre` = ?');
       $c=$consulta->execute(array($s, $m));
    }


}