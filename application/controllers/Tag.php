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
}