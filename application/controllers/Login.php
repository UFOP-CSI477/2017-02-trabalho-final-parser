<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe controller para operacoes de login do usuario
 * @author Silvandro Oliveira, Maycon Junior
 * @package controllers
 */	
class Login extends CI_Controller
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
	 * Metodo que exibe a view inicial para acesso a aplicacao
	 * @access public
	 */
	public function index()
	{
		$this->load->view('login/acesso');
	}

	/**
	 * Metodo que exibe a view para criacao de usuario
	 * @access public
	 */
	public function criarUsuario()
	{
		$this->load->view('login/criar');	
	}

	/**
	 * Metodo que realiza a persistencia de dados do usuario criado
	 * @access public
	 */
	public function confirmarCriacao()
	{
		$this->Usuarios_model->nome = $_POST['ipUsuario'];
		$this->Usuarios_model->senha = $_POST['ipSenha'];
		$this->Usuarios_model->inserir();

		echo "<script language='javascript'>alert('Usuário criado com sucesso.'); document.location='/parserufop/login';</script>";
		die;
	}

	/**
	 * Metodo que valida os dados e realiza a autenticacao do usuario
	 * @access public
	 */
	public function autenticar()
	{
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('ipUsuario', '', 'callback_validarUsuario');
		$this->form_validation->set_rules('ipSenha', '', 'callback_validarSenha');

		if($this->form_validation->run()) {

			$this->Usuarios_model->nome = $_POST['ipUsuario'];
			$usuario = $this->Usuarios_model->getPorNomeSenha();

			$sessao = [
			'id' => $usuario->id_usuario,
			'nome' => $usuario->nome
			];
			$this->session->set_userdata($sessao);

			redirect('perfil/exibirPerfil/');
		} else {
			$this->index();
		}
	}

	/**
	 * Metodo callback que valida o nome do usuario
	 * @access public
	 * @param string $nome Nome do usuario
	 * @return boolean Resultado da validacao
	 */
	public function validarUsuario($nome)
	{
		$this->Usuarios_model->nome = $nome;
		$usuario = $this->Usuarios_model->getPorNomeSenha();
		if(empty($usuario)) {
			$this->form_validation->set_message('validarUsuario', 'Usuário inválido.');
			return false;
		}
		return true;
	}

	/**
	 * Metodo callback que valida a senha do usuario
	 * @access public
	 * @param string $senha Senha do usuario
	 * @return boolean Resultado da validacao
	 */
	public function validarSenha($senha)
	{
		$this->Usuarios_model->nome = $_POST['ipUsuario'];
		$this->Usuarios_model->senha = $senha;
		$usuario = $this->Usuarios_model->getPorNomeSenha();
		if(empty($usuario)) {
			$this->form_validation->set_message('validarSenha', 'Senha inválida.');
			return false;
		}
		return true;
	}
}