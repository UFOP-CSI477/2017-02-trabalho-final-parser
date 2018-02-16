<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe controller para operacoes de tags do usuario
 * @author Silvandro Oliveira, Maycon Junior
 * @package controllers
 */
class Tag extends CI_Controller
{
	/**
	 * Construtor da classe
	 * @access public
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tags_model');
	}

	/**
	 * Metodo que exibe a view para cadastro de tag
	 * @access public
	 */
	public function cadastrar()
	{
		$dados = [
		'view' => 'tag/cadastrar',
		'dados' => ''
		];

		$this->load->view('padrao/layoutpadrao', $dados);	
	}

	/**
	 * Metodo que realiza a comunicacao com a api e persistencia de dados
	 * @access public
	 */
	public function confirmarCadastro()
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
            $jsonDados = json_encode($dados);
            $ch = curl_init('http://localhost:8090/api/tag');
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDados);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Accept: application/json',
                'Content-Type: application/json')
            );
            $result = curl_exec($ch);
			$resposta = json_decode($result);
			
            // FAZER O JSON E MANDAR PRA API
            if(!empty($resposta) && $resposta->code != 2){
            	$msg = $resposta->content;
                echo "<script language='javascript'>alert('$msg'); document.location='/parserufop/perfil/exibirPerfil';</script>";
                die;
            } else {
            	echo "<script language='javascript'>alert('Erro ao cadastrar tag.'); document.location='/parserufop/perfil/exibirPerfil';</script>";
                die;
            }
		} else {
			redirect('perfil/exibirPerfil');
		}
	}
}