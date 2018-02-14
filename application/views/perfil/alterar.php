<section class="content-header">
  <h1>Alterar usuário</h1>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-6">
      <div class="box box-primary">
        <form role="form" action="<?php echo base_url('perfil/confirmarAlteracao'); ?>" method="post">
          <div class="box-body">
            <div class="has-error"><?php echo validation_errors(); ?><br></div>
            <div class="form-group">
              <label>Nome*</label>
              <input type="text" name="ipUsuario" class="form-control" value="<?=$nome?>">
            </div>
            <div class="form-group">
              <label>Senha*</label>
              <input type="password" name="ipSenha" class="form-control" value="<?=$senha?>">
            </div>
          </div>
          <input type="hidden" name="id" value="<?=$id?>">
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Confirmar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>