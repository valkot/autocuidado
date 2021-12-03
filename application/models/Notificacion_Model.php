<?php 
    class Notificacion_Model extends CI_Model
    {
        function load_Estamentos()
        {
            $query=$this->db->query("SELECT 
            ESTAM_id,
            ESTAM_tipo
            FROM estamentos");
            return $query->result();
        }

        function load_CalidadJuridica()
        {
            $query=$this->db->query("SELECT 
            CJ_id,
            CJ_tipo
            FROM calidades_juridicas");
            return $query->result();
        }

        function insertSolicitud($nuevoRegistro)
        {
            $this->db->insert("notificaciones", $nuevoRegistro);
        }
    }
?>


