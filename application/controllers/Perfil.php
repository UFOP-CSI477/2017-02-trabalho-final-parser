<?php

class Perfil extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function exibirPerfil()
	{
		$this->load->view('padrao/layoutpadrao');
	}
}