<?php 
class Mantenedor_Model extends CI_Model
{
    function load_CalidadJuridica()
    {
        $query=$this->db->query("SELECT 
		CJ_id,
		CJ_tipo
		FROM calidades_juridicas");
        return $query->result();
    }

    function load_Estamento()
    {
        $query=$this->db->query("SELECT 
		ESTAM_id,
		ESTAM_tipo
		FROM estamentos");
        return $query->result();
    }

    function get_dataFuncionario($userID)
    {
        $query=$this->db->query("SELECT
        CONCAT(a.USR_nombre,' ',a.USR_paterno,' ',a.USR_materno) AS NC,
        a.PERFIL_id,
        b.SERV_descripcion,
        a.SERV_id
        FROM  usuarios a
        LEFT JOIN servicios b
        ON a.SERV_id=b.SERV_id
        WHERE a.USR_id= $userID;");
        return $query->result();
    }

    function insertSolicitud($nuevoRegistro)
    {
        $this->db->insert("usuarios", $nuevoRegistro);
    }

    function updateSolicitud($camposActualizados, $condicion)
    {
        $this->db->where($condicion);
        $this->db->update("usuarios", $camposActualizados);
 
        return $rutActualizado = $this->db->insert_id();
    }

    function deleteUsuario($id)
    {
        $data = ['EST_id' => 0];
        $this->db->where('USR_id', $id);
        $this->db->update("usuarios", $data);
        //echo'Eliminado';
        return $rutActualizado = $this->db->insert_id();
    }

    function load_dataUser($userID)
    {
        $query=$this->db->query("SELECT 
        a.USR_id,
        a.RESP_id,
        a.SERV_id,
        a.PERFIL_id,
        b.SERV_descripcion     
        FROM usuarios a
        LEFT JOIN servicios b
        ON a.SERV_id=b.SERV_id
        WHERE a.USR_id = $userID");
        return $query->result();
    }

    function load_Servicios()
    {
        $query=$this->db->query("SELECT 
		SERV_id,
		SERV_descripcion
		FROM servicios");
        return $query->result();
    }

    function load_Regiones()
    {
        $query=$this->db->query("SELECT 
		REG_id,
		REG_nombre
		FROM regiones");
        return $query->result();
    }

    function load_Generos()
    {
        $query=$this->db->query("SELECT 
		GEN_id,
		GEN_tipo
		FROM generos");
        return $query->result();
    }

    function load_Funcionarios()
    {
        $query=$this->db->query("SELECT 
        a.USR_id,
        a.USR_run, 
        CONCAT(a.USR_nombre,' ',a.USR_paterno,' ',a.USR_materno) as NC,
        b.CJ_tipo,
        c.ESTAM_tipo,
        d.EST_tipo  
        FROM usuarios a
        LEFT JOIN calidades_juridicas b
        ON a.CJ_id=b.CJ_id
        LEFT JOIN estamentos c
        ON a.ESTAM_id=c.ESTAM_id
        LEFT JOIN estados d
        ON a.EST_id=d.EST_id
        WHERE a.EST_id = 1");
        return $query->result();
    }

    function load_FuncionariosPerfilados($servicio)
    {
        $query=$this->db->query("SELECT 
        a.USR_id,
        a.USR_run, 
        CONCAT(a.USR_nombre,' ',a.USR_paterno,' ',a.USR_materno) as NC,
        b.CJ_tipo,
        c.ESTAM_tipo,
        d.EST_tipo  
        FROM usuarios a
        LEFT JOIN calidades_juridicas b
        ON a.CJ_id=b.CJ_id
        LEFT JOIN estamentos c
        ON a.ESTAM_id=c.ESTAM_id
        LEFT JOIN estados d
        ON a.EST_id=d.EST_id
        WHERE a.SERV_id = $servicio
        AND a.EST_id = 1");
        return $query->result();
    }

    function show_EditarUsuario($id)
    {
        $query=$this->db->query("SELECT 
        a.USR_id,
        a.USR_run,
        a.USR_nombre,
        a.USR_paterno,
        a.USR_materno,
        b.CJ_id,
        b.CJ_tipo,
        c.ESTAM_id,
        c.ESTAM_tipo,
        d.SERV_id,
        d.SERV_descripcion,
        e.GEN_id,
        e.GEN_tipo,
        f.REG_id,
        f.REG_nombre,
        g.COM_id,
        g.COM_nombre,
        a.USR_email
        FROM usuarios a
        LEFT JOIN calidades_juridicas b
        ON a.CJ_id=b.CJ_id
        LEFT JOIN estamentos c
        ON a.ESTAM_id=c.ESTAM_id
        LEFT JOIN servicios d
        ON a.SERV_id=d.SERV_id
        LEFT JOIN generos e
        ON a.GEN_id=e.GEN_id
        LEFT JOIN regiones f
        ON a.REG_id=f.REG_id
        LEFT JOIN comunas g
        ON a.COM_id=g.COM_id
        WHERE USR_id =$id");
        return $query->result();
    }
}