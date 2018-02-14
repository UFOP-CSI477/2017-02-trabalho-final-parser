<?php

class Comentarios_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getTotalPorTag($idTag)
	{
		return $this->db->select('COUNT(*) as total')
						  ->from('comentarios c')
						  ->where("c.id_comentario = '$idTag'")
						  ->get()
						  ->row_object();
	}
}