<?php

class PacienteModel{
   private $db;
 
   function __construct(){
       $this->db = new PDO('mysql:host=localhost;'.'dbname=turnofacil;charset=utf8', 'root', '');
   }

public function mostrar_medicos_filtrados( $ob_soc, $especialidad){
    $consulta = $this->db->prepare('SELECT m.* FROM medico m, especialidad e where m.id_especialidad = e.id_especialidad and e.especialidad=? and m.obra_social = ?');
    $consulta->execute([$especialidad, $ob_soc]);
    $medico = $consulta->fetchAll(PDO :: FETCH_OBJ);
    return $medico;
}

public function mostrar_turnos_filtrados($medico){
    $consulta = $this->db->prepare('SELECT t.* FROM turno t, medico m where m.id_medico = ? and m.id_medico = t.id_medico and t.id_paciente is null');
    $consulta->execute([$medico]);
    $medico = $consulta->fetchAll(PDO :: FETCH_OBJ);
    return $medico;
}

public function reservar_turno($paciente, $turno){
    $consulta = $this->db->prepare('UPDATE  turno t set id_paciente = ? where t.id_turno=?');
    $consulta->execute([$paciente, $turno]);
}


}