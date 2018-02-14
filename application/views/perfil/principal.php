<section class="content-header">
      <h1>Perfil do Usuário</h1>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <h3 class="profile-username text-center"><?=$nome?></h3><br>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Seguidores</b> <a class="pull-right"><?=$seguidores?></a>
                </li>
                <li class="list-group-item">
                  <b>Seguindo</b> <a class="pull-right"><?=$seguindo?></a>
                </li>
                <li class="list-group-item">
                  <b>Tags</b> <a class="pull-right"><?=$tags?></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
</section>