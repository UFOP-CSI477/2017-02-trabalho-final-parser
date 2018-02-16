<?php

class Perfil extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tags_model');
		$this->load->model('Usuarios_model');
		$this->load->model('UsuariosRelacao_model');
	}

	public function exibirPerfil($id)
	{
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
		'id' => $id,
		'dados' => $dadosPerfil
		];

		$this->load->view('padrao/layoutpadrao', $dados);
	}


	public function alterar($id)
	{
		$usuario = $this->Usuarios_model->getPorId($id);
		$dadosPerfil = [
		'id' => $id,
		'nome' => $usuario->nome,
		'senha' => $usuario->senha
		];

		$dados = [
		'view' => 'perfil/alterar',
		'id' => $id,
		'dados' => $dadosPerfil
		];

		$this->load->view('padrao/layoutpadrao', $dados);	
	}


	public function confirmarAlteracao()
	{
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('ipUsuario', 'Nome', 'required');
		$this->form_validation->set_rules('ipSenha', 'Senha', 'required');

		$id = $_POST['id'];
		if($this->form_validation->run()) {

			$dados = [
    		'nome' => $_POST['ipUsuario'],
    		'senha' => $_POST['ipSenha']
			];
			$this->Usuarios_model->updPorId($id, $dados);
			echo "<script language='javascript'>alert('Usuário alterado com sucesso'); document.location=\"exibirPerfil/$id\";</script>";
			die;
		} else {
			$this->alterar($id);
		}
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