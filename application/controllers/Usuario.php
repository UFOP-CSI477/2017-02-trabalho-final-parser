<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe controller para operacoes do usuario
 * @author Silvandro Oliveira, Maycon Junior
 * @package controllers
 */
class Usuario extends CI_Controller
{

	/**
	 * Construtor da classe
	 * @access public
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Usuarios_model');
	}

	/**
	 * Metodo que exibe a view para alteracao de usuario
	 * @access public
	 */
	public function alterar()
	{
		$usuario = $this->Usuarios_model->getPorId($this->session->userdata('id'));
		$dadosPerfil = [
		'nome' => $usuario->nome,
		'senha' => $usuario->senha
		];

		$dados = [
		'view' => 'usuario/alterar',
		'dados' => $dadosPerfil
		];

		$this->load->view('padrao/layoutpadrao', $dados);	
	}

	/**
	 * Metodo que realiza a persistencia de dados na alteracao de usuario
	 * @access public
	 */
	public function confirmarAlteracao()
	{
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('ipUsuario', 'Nome', 'required');
		$this->form_validation->set_rules('ipSenha', 'Senha', 'required');

		if($this->form_validation->run()) {

			$dados = [
    		'nome' => $_POST['ipUsuario'],
    		'senha' => $_POST['ipSenha']
			];
			$this->Usuarios_model->updPorId($this->session->userdata('id'), $dados);
			echo "<script language='javascript'>alert('Usuário alterado com sucesso'); document.location='/parserufop/perfil/exibirPerfil';</script>";
			die;
		} else {
			$this->alterar();
		}
	}
}