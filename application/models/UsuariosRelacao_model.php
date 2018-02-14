<?php

class UsuariosRelacao_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}


	public function getTotalSeguidores($idUsuario)
	{
		return $this->db->select('COUNT(*) as total')
						  ->from('usuarios_relacao u')
						  ->where("u.id_seguindo = '$idUsuario'")
						  ->get()
						  ->row_object();
	}


	public function getTotalSeguindo($idUsuario)
	{
		return $this->db->select('COUNT(*) as total')
						  ->from('usuarios_relacao u')
						  ->where("u.id_seguidor = '$idUsuario'")
						  ->get()
						  ->row_object();
	}
}