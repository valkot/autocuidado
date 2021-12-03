<?php
class Mensaje_Model extends CI_Model
{
    function load_respuestas($userID)
    {
        $query=$this->db->query("SELECT 
        SUM(EVAL_1+EVAL_2+EVAL_3+EVAL_4+EVAL_5+EVAL_6+EVAL_7+EVAL_8+EVAL_9+EVAL_10+EVAL_11+EVAL_12) AS SUMA 
        FROM evaluaciones 
        WHERE USR_id = $userID 
        AND EVAL_fechaCreacion = (SELECT MAX(EVAL_fechaCreacion) FROM evaluaciones);");
        return $query->result();
    }

    function show_respuestas($userID)
    {
        $query=$this->db->query("SELECT 
        EVAL_2,
        EVAL_9,
        EVAL_12 
        FROM evaluaciones 
        WHERE USR_id = $userID 
        AND EVAL_fechaCreacion = (SELECT MAX(EVAL_fechaCreacion) FROM evaluaciones);");
        return $query->result();
    }
}
?>