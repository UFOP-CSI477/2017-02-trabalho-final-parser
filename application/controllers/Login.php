<?php

defined('BASEPATH') OR exit('No direct script access allowed');
	
class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Usuarios_model');
	}
	
	public function index()
	{
		$this->load->view('login/acesso');
	}

	public function criarUsuario()
	{
		$this->load->view('login/criar');	
	}


	public function confirmarCriacao()
	{
		$this->Usuarios_model->nome = $_POST['ipUsuario'];
		$this->Usuarios_model->senha = $_POST['ipSenha'];
		$this->Usuarios_model->inserir();

		echo "<script language='javascript'>alert('Usuário criado com sucesso.'); history.back();</script>";
		die;
	}

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

			redirect('perfil/exibirPerfil/' . $usuario->id_usuario);
		} else {
			$this->index();
		}
	}


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