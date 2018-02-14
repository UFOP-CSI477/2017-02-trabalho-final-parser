<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Parser UFOP</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/ionicons.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE/AdminLTE.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/skins/_all-skins.min.css'); ?>">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini layout-boxed">
<div class="wrapper">
  <header class="main-header">
    <a href="<?php echo base_url('perfil/exibirPerfil/' . $id); ?>" class="logo">
      <span class="logo-lg"><b>Parser</b>UFOP</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">
        <li class="treeview">
          <a href="#">
            <i class="fa fa-file-text "></i> <span>Tags</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../forms/advanced.html"><i class="fa fa-upload"></i>Cadastrar</a></li>
            <li><a href="../forms/editors.html"><i class="fa fa-edit"></i>Editar</a></li>
            <li><a href="../forms/general.html"><i class="fa fa-search"></i>Pesquisar</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Usuários</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../forms/general.html"><i class="fa fa-circle-o"></i>Quem me segue</a></li>
            <li><a href="../forms/general.html"><i class="fa fa-circle-o"></i>Quem eu sigo</a></li>
            <li><a href="../forms/advanced.html"><i class="fa fa-search"></i>Pesquisar Usuário</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cog"></i> <span>Opções</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('perfil/alterar/' . $id); ?>"><i class="fa fa-edit"></i>Alterar dados do usuário</a></li>
          </ul>
        </li>
        <li><a href="<?php echo base_url('login'); ?>"><i class="fa fa-spinner"></i> <span>Sair</span></a></li>
      </ul>
    </section>
  </aside>
  <div class="content-wrapper">
  <?php $this->load->view($view, $dados); ?>
  </div>
  <div class="control-sidebar-bg"></div>
</div>
<script src="<?php echo base_url('assets/js/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/fastclick/fastclick.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/AdminLTE/adminlte.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/demo.js'); ?>"></script>
</body>
</html>