<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Parser UFOP</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap/bootstrap.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/css/font-awesome.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/css/ionicons.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/css/AdminLTE/AdminLTE.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/css/plugins/iCheck/square/blue.css')?>">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <b>Parser</b>UFOP
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Criar novo usuário</p>

    <form action="<?=base_url('login/confirmarCriacao')?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="ipUsuario" class="form-control" placeholder="Usuário">
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="ipSenha" class="form-control" placeholder="Senha">
      </div>
      <div class="row">
        <div class="col-xs-6">
          <button type="button" class="btn btn-primary btn-block btn-flat" onclick="history.back();">Voltar</button>
        </div>
        <div class="col-xs-6">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Confirmar</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script src="<?=base_url('assets/js/jquery/jquery.min.js')?>"></script>
<script src="<?=base_url('assets/js/bootstrap/bootstrap.min.js')?>"></script>
<script src="<?=base_url('assets/js/iCheck/icheck.min.js')?>"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
