<?php

class Usuarios_model extends CI_Model
{
	public $idUsuario;
	public $dataCriacao;
	public $nome;
	public $senha;

	public function __construct()
	{
		parent::__construct();
	}

	public function inserir()
	{
		$dados = [
		'nome' => $this->nome,
		'senha' => $this->senha
		];
		return $this->db->insert('usuarios', $dados);
	}

	public function getPorNomeSenha()
	{
		$where = ['nome' => $this->nome];
		if(!empty($this->senha)) {
			$where['senha'] = $this->senha;
		}
		$query = $this->db->get_where(
			'usuarios',
			$where
			);
		return $query->row_object();
	}


	public function getPorId($id)
	{
		$query = $this->db->get_where(
			'usuarios',
			['id_usuario' => $id]
			);
		return $query->row_object();
	}


	public function updPorId($id, $dados)
	{
		$this->db->where('id_usuario', $id); 
		$this->db->update('usuarios', $dados);
	}
}