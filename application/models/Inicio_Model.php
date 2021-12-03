<?php
    class Inicio_Model extends CI_Model
    {
        function insertEvaluacion($nuevoRegistro)
        {
            $this->db->insert("evaluaciones", $nuevoRegistro);
        }

        function load_datosFuncionario($userID)
        {
            $query=$this->db->query("SELECT 
            USR_nombre,
            USR_paterno,
            USR_materno,
            SERV_id
            FROM usuarios WHERE USR_id = $userID;");
            return $query->result();
        }

        function load_respuestas($userID)
        {
            $query=$this->db->query("SELECT 
            SUM(EVAL_1+EVAL_2+EVAL_3+EVAL_4+EVAL_5+EVAL_6+EVAL_7+EVAL_8+EVAL_9+EVAL_10+EVAL_11+EVAL_12) AS SUMA 
            FROM evaluaciones 
            WHERE USR_id = $userID 
            AND EVAL_fechaCreacion = (SELECT MAX(EVAL_fechaCreacion) FROM evaluaciones);");
            return $query->result();
        }

        function load_datosJefatura($userID)
        {
            $query=$this->db->query("SELECT 
            USR_email 
            FROM usuarios 
            WHERE RESP_id = 1
            AND  SERV_id = (SELECT SERV_id FROM usuarios WHERE USR_id = $userID)");
            return $query->result();  
        }

        function get_encuestaHoy($userID)
        {
            $query=$this->db->query("SELECT COUNT(*) AS TOTAL FROM evaluaciones WHERE USR_id = $userID AND EVAL_fechaCreacion = CURDATE();");
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
            /*
            $query=$this->db->query("SELECT 
            SERV_id 
            FROM evaluaciones
            WHERE EVAL_fechaCreacion=CURDATE()
            AND SERV_id IS NOT NULL 
            GROUP BY SERV_id");
            return $query->result(); 
        */        }
    }
?>