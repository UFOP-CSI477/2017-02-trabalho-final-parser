<?php

class Tags_model extends CI_Model
{
	public $idTag;
	public $dataCriacao;
	public $definicao;
	public $nome;

	public function __construct()
	{
		parent::__construct();
	}

	public function inserir()
	{
		// 
		// 
		// 
		// 
		// 
	}

	public function getTotalPorUsuario($idUsuario)
	{
		return $this->db->select('COUNT(*) as total')
						  ->from('tags t')
						  ->where("t.id_usuario = '$idUsuario'")
						  ->get()
						  ->row_object();
	}

	public function getPorId($id)
	{
		$query = $this->db->get_where(
			'tags',
			['id_tag' => $id]
			);
		return $query->row_object();
	}
}