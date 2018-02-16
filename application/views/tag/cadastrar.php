<section class="content-header">
  <h1>Cadastrar Tag</h1>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-6">
      <div class="box box-primary">
        <form role="form" action="<?=base_url('tag/confirmarCadastro')?>" method="post">
          <div class="box-body">
            <div class="has-error"><?=validation_errors()?><br></div>
            <div class="form-group">
              <label>Nome*</label>
              <input type="text" name="ipNome" class="form-control">
            </div>
            <div class="form-group">
              <label>Definição*</label>
              <input type="text" name="ipDefinicao" class="form-control">
            </div>
            <div class="form-group">
              <label>Grupo*</label>
              <input type="text" name="ipGrupo" class="form-control">
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Confirmar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>