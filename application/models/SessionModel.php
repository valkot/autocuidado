<?php 
class SessionModel extends CI_Model
{
    function getCredenciales($credenciales)
    {
        $usuario = $credenciales['usuario'];
        $password = $credenciales['password'];
        //$query=$this->db->query("SELECT COUNT(*) AS TOTAL FROM usuarios WHERE USR_username = '$usuario' AND USR_password = '$password';");

        $sql = "SELECT COUNT(*) AS TOTAL FROM usuarios WHERE USR_run = ? AND USR_password = ?;";
        $query = $this->db->query($sql, array($usuario, $password));

        return $query->result();
    }

    function getNombreUsuario($credenciales)
    {
        $usuario = $credenciales['usuario'];
        $password = $credenciales['password'];
        //$query=$this->db->query("SELECT CONCAT(USR_nombres, ' ', USR_paterno, ' ', USR_materno) AS NC, USR_id FROM usuarios WHERE USR_username = '$usuario' AND USR_password = '$password';");
        
        $sql = "SELECT CONCAT(USR_nombre,' ',USR_paterno,' ',USR_paterno) AS NC, USR_id FROM usuarios WHERE USR_run = ? AND USR_password = ?;";
        $query = $this->db->query($sql, array($usuario, $password));
        
        return $query->result();
    }

    function getPerfilUsuario($credenciales)
    {
        $usuario = $credenciales['usuario'];
        $password = $credenciales['password'];
        $query=$this->db->query("SELECT PERFIL_id 
        FROM usuarios 
        WHERE USR_run = '$usuario' AND USR_password = '$password';");

        return $query->result();
    }

    function getUltimoAcceso($usuario)
    {
        $query=$this->db->query("SELECT ACC_fecha, ACC_username FROM accesos_usuarios WHERE ACC_username = '$usuario' ORDER BY ACC_id DESC LIMIT 1,1");
        return $query->result();
    }

    function addRegistroLogin($accesos)
    {
        $this->db->insert("accesos_usuarios", $accesos);
        return $idInsertado = $this->db->insert_id();
    }

    function get_encuestaHoy($userID)
    {
        $query=$this->db->query("SELECT COUNT(*) AS TOTAL FROM evaluaciones WHERE USR_id = $userID AND EVAL_fechaCreacion = CURDATE();");
        return $query->result();
    }

    function get_rutExiste($rutEntero)
    {
        $query=$this->db->query("SELECT COUNT(*) AS TOTAL FROM usuarios WHERE USR_run = '$rutEntero' ");
        return $query->result();
    }
}
?>