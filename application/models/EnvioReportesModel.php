<?php
    class EnvioReportesModel extends CI_Model
    {
        function generacionExcel($losServicios)
        {
            $query=$this->db->query("SELECT
            CONCAT(DAY(a.EVAL_fechaCreacion),'-',MONTH(a.EVAL_fechaCreacion),'-',YEAR(a.EVAL_fechaCreacion)) AS fecha,
            b.USR_run AS Rut,
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
            a.EVAL_resultado
            FROM evaluaciones a
            LEFT JOIN usuarios b
            ON a.USR_id=b.USR_id
            WHERE a.SERV_id = $losServicios
            AND a.EVAL_fechaCreacion = CURDATE()");
            return $query->result();
        }
        
        function load_idServicios()
        {

            $query=$this->db->query("SELECT DISTINCT a.SERV_id,
            b.USR_id,
            CONCAT(b.USR_nombre,' ',b.USR_paterno,' ',b.USR_materno) AS NC_jefe,
            b.USR_email
            FROM evaluaciones a
            LEFT JOIN usuarios b
            ON a.SERV_id=b.SERV_id
            WHERE a.EVAL_fechaCreacion = CURDATE()
            AND a.SERV_id IS NOT NULL 
            AND b.RESP_id = 1");
            return $query->result(); 
        }
    }
?>