<?php
class Funcionario_Model extends CI_Model
{
    function load_Regiones()
    {
        $query=$this->db->query("SELECT 
		REG_id,
		REG_nombre
		FROM regiones");
        return $query->result();
    }

    function insertSolicitud($nuevoRegistro)
    {
        $this->db->insert("solicitudes", $nuevoRegistro);
    }

    function load_Usuario($run)
    {
        $query=$this->db->query("SELECT 
		USR_nombre,
        USR_paterno,
        USR_materno
        FROM usuarios
        WHERE USR_run = '$run';");
        return $query->result();
    }

    function get_Comuna($comuna)
    {
        $query=$this->db->query("SELECT 
		COM_nombre
        FROM comunas
        WHERE COM_id = '$comuna';");
        return $query->result();
    }
}
?>