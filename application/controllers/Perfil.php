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

	public function criarTag()
	{
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('ipNome', 'Nome', 'required');
		$this->form_validation->set_rules('ipDefinicao', 'Definicao', 'required');
		$this->form_validation->set_rules('ipGrupo', 'Grupo', 'required');

		// $id = $_POST['id'];
		if($this->form_validation->run()) {
			$id = $this->session->userdata('id');
			
            $dados = array('UserId' => $id,
							'Name' => $_POST['ipNome'],
                            'Definition' => $_POST['ipDefinicao'],
                            'Group' => $_POST['ipGrupo']);
            $jsonDados = json_encode($data);
            $ch = curl_init('http://localhost:8090/api/tag');
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Accept: application/json',
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string))
            );
            $result = curl_exec($ch);
			$resposta = json_decode($result);
			$msg = $resposta['content'];
            // FAZER O JSON E MANDAR PRA API
            if($resposta['code'] != 2){
                echo "<script language='javascript'>alert('$msg'); document.location=\"exibirTag/$id\";</script>";
                die;
            }else{
			    $this->exibirPerfil($id);
            }
		} else {
			$this->exibirPerfil($id);
		}
	}
}