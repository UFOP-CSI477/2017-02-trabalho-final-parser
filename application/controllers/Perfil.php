<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe controller para operacoes do perfil do usuario
 * @author Silvandro Oliveira, Maycon Junior
 * @package controllers
 */
class Perfil extends CI_Controller
{
	/**
	 * Construtor da classe
	 * @access public
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tags_model');
		$this->load->model('Usuarios_model');
		$this->load->model('UsuariosRelacao_model');
	}

	/**
	 * Metodo que exibe a view com informacoes do perfil do usuario
	 * @access public
	 */
	public function exibirPerfil()
	{
		$id = $this->session->userdata('id');
		$usuario = $this->Usuarios_model->getPorId($id);
		$tags = $this->Tags_model->getTotalPorUsuario($id);
		$seguidores = $this->UsuariosRelacao_model->getTotalSeguidores($id);
		$seguindo = $this->UsuariosRelacao_model->getTotalSeguindo($id);

		$dadosPerfil = [
		'nome' => $usuario->nome,
		'tags' => $tags->total,
		'seguidores' => $seguidores->total,
		'seguindo' => $seguindo->total
		];

		$dados = [
		'view' => 'perfil/principal',
		'dados' => $dadosPerfil
		];

		$this->load->view('padrao/layoutpadrao', $dados);
	}

	/**
	 * Metodo que exibe alert de funcionalidade ainda nao desenvolvida
	 * @access public
	 */
	public function emDesenvolvimento()
	{
		echo "<script>alert('Funcionalidade ainda não desenvolvida'); document.location='exibirPerfil';</script>";
		die;
	}
}