<?php

class Tag extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tags_model');
		// $this->load->model('Usuarios_model');
		// $this->load->model('UsuariosRelacao_model');
	}

	public function exibirTag($id)
	{
		$tag = $this->Tags_model->getPorId($id);
		$comentarios = $this->Comentarios_model->getTotalPorTag($id);
		$usuario = $this->Usuarios_model->getPorId($tag->idUsuario);
		// $tags = $this->Tags_model->getTotalPorUsuario($id);
		// $seguidores = $this->UsuariosRelacao_model->getTotalSeguidores($id);
		// $seguindo = $this->UsuariosRelacao_model->getTotalSeguindo($id);

        $dadosTag = [
            'nome' => $tag->nome,
            'definicao' => $tag->definicao,
            'comentarios' => $comentarios
        ];
		// $dadosPerfil = [
		// 'nome' => $usuario->nome,
		// 'tags' => $tags->total,
		// 'seguidores' => $seguidores->total,
		// 'seguindo' => $seguindo->total
		// ];

		$dados = [
		'view' => 'tag/principal',
		'id' => $id,
		'dados' => $dadosTag
		];

		$this->load->view('padrao/layoutpadrao', $dados);
	}


	public function alterar($id)
	{
		$tag = $this->Tags_model->getPorId($id);
		$dadosTags= [
		'id' => $id,
		'nome' => $tag->nome,
		'definicao' => $tag->definicao
		];

		$dados = [
		'view' => 'tag/alterar',
		'id' => $id,
		'dados' => $dadosTags
		];

		$this->load->view('padrao/layoutpadrao', $dados);	
	}


	public function confirmarAlteracao()
	{
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('ipNome', 'Nome', 'required');
		$this->form_validation->set_rules('ipDefinicao', 'Definicao', 'required');
		$this->form_validation->set_rules('ipGrupo', 'Grupo', 'required');

		// $id = $_POST['id'];
		if($this->form_validation->run()) {
            $dados = array('TagId' => $_POST['id'],
                            'Name' => $_POST['ipNome'],
                            'Definition' => $_POST['ipDefinicao'],
                            'Group' => $_POST['ipGrupo']);
            $jsonDados = json_encode($data);
            $ch = curl_init('http://localhost:8090/api/tag');
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Accept: application/json',
                'Content-Length: ' . strlen($data_string))
            );
            $result = curl_exec($ch);
            $resposta = json_decode($result);
			$msg = $resposta['content'];
            // FAZER O JSON E MANDAR PRA API
            if($resposta['Code'] != 2){
                echo "<script language='javascript'>alert('$msg'); document.location=\"exibirTag/$id\";</script>";
                die;
            }else{
			    $this->alterar($id);
            }
		} else {
			$this->alterar($id);
		}
    }

	public function criar($id)
	{
		// $tag = $this->Tags_model->getPorId($id);
		// $dadosTags= [
		// 'id' => $id,
		// 'nome' => $tag->nome,
		// 'definicao' => $tag->definicao
		// ];

		// $dados = [
		// 'view' => 'tag/alterar',
		// 'id' => $id,
		// 'dados' => $dadosTags
		// ];

		$this->load->view('padrao/layoutpadrao', $dados);	
	}

}