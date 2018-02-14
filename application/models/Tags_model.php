<?php

class Tags_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}


	public function getTotalPorUsuario($idUsuario)
	{
		return $this->db->select('COUNT(*) as total')
						  ->from('tags t')
						  ->where("t.id_usuario = '$idUsuario'")
						  ->get()
						  ->row_object();
	}
}