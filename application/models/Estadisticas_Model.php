<?php
class Estadisticas_Model extends CI_Model
{
    function showDashboard_A($userID)
    {
        $query=$this->db->query("SELECT
        a.EVAL_id,
        a.EVAL_1,
        a.EVAL_2,
        a.EVAL_3,
        a.EVAL_4,
        a.EVAL_5,
        a.EVAL_6,
        a.EVAL_7,
        a.EVAL_8,
        a.EVAL_9,
        a.EVAL_10,
        a.EVAL_11,
        a.EVAL_12,
        CONCAT(DAY(a.EVAL_fechaCreacion),'/',MONTH(a.EVAL_fechaCreacion),'/',YEAR(a.EVAL_fechaCreacion)) AS fecha
        FROM evaluaciones a
        WHERE a.USR_id = $userID
        ");
        return $query->result();
        
    }

    function get_dataFuncionario($userID)
    {
        $query=$this->db->query("SELECT
        CONCAT(a.USR_nombre,' ',a.USR_paterno,' ',a.USR_materno) AS NC,
        a.PERFIL_id,
        b.SERV_descripcion
        FROM  usuarios a
        LEFT JOIN servicios b
        ON a.SERV_id=b.SERV_id
        WHERE a.USR_id= $userID;");
        return $query->result();
    }

    function DESCARGA_EXCEL($servicio)
    {
        $query=$this->db->query("SELECT
        CONCAT(b.USR_nombre,' ',b.USR_paterno,' ',b.USR_materno) AS NC,
        a.EVAL_1,
        a.EVAL_2,
        a.EVAL_3,
        a.EVAL_4,
        a.EVAL_5,
        a.EVAL_6,
        a.EVAL_7,
        a.EVAL_8,
        a.EVAL_9,
        a.EVAL_10,
        a.EVAL_11,
        a.EVAL_12,
        CONCAT(DAY(a.EVAL_fechaCreacion),'-',MONTH(a.EVAL_fechaCreacion),'-',YEAR(a.EVAL_fechaCreacion)) AS fecha
        FROM evaluaciones a
        LEFT JOIN usuarios b
        ON a.USR_id=b.USR_id
        WHERE a.SERV_id = $servicio
        AND a.EVAL_fechaCreacion = CURDATE()");
        return $query->result();
        
    }

    function showDashboard_B($ubicacionPostulante)
    {
        $query=$this->db->query("SELECT
        (SELECT COUNT(*) FROM usuarios WHERE UBIC_id = $ubicacionPostulante) AS UVS,
        (SELECT COUNT(*) FROM votaciones WHERE UBIC_id = $ubicacionPostulante) AS UVD");
        return $query->result();
    }

    function showDashboard_C($ubicacionPostulante)
    {
        $query=$this->db->query("SELECT
        POST_nc
        FROM postulantes
        WHERE UBIC_id = $ubicacionPostulante");
        return $query->result();
    }

    function load_Data($userID)
    {
        $query=$this->db->query("SELECT 
        USR_username,
        USR_nc,
        USR_perfil,
        SUF_id,
        UBIC_id,
        EST_id
        FROM usuarios
        WHERE USR_id=$userID");
        return $query->result();
    }

}
?>