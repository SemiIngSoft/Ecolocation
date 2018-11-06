<?php
  include "../php/functions/mostrar_comentarios.php";
  $centroID = $_GET["id"];
  $comentarios = mostrar_comentarios($centroID);
  include '../php/clases/Sessions.php';
  //session_start();
  //Sessions::set("name", "jesse");
  $Sessions = new Sessions();
  $Sessions->start();
  $Sessions->verify_session();
 ?>
<?php include '../templates/header.php'; ?>

  <div class="comentarios"></div>

  <div class="container mt-3">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Comentarios de centros de recoleccion
          </div>
          <div class="card-body ">
            <div class="row">


              <div class="col-lg-6">
                <div class="card">
                  <div class="card-body">
                    <p class="lead">
                      <strong>Empresa: </strong>
                      <?= $comentarios[0]["centro_nombre"] ?>
                    </p>
                    <p>
                      <strong>Domicilio: </strong>
                      <?= $comentarios[0]["centro_domicilio"]?>
                    </p>
                    <!--<p><strong>Telefono: </strong> 33-15-45-46</p>-->
                  </div>
                </div>
              </div>
              <div class="col-lg-6 ">
                <div class="card">
                  <input id="mapId" value="<?= $centroID ?>" hidden>
                  <div class="card-body">
                    <div id="map"  class="z-depth-1" style="height: 300px">
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-sm-12">
        <h3>Comentarios</h3>
      </div><!-- /col-sm-12 -->
    </div><!-- /row -->
    <div class="row" id="comentarios">
      <?php foreach ($comentarios as $comentario): ?>
        <div class="col-sm-8 my-2">
          <div class="card ">
            <div class="card-header">
              <strong>
                <?=$comentario["ciudadano_correo"]?>
              </strong>
              <span class="text-muted">
                <?= $comentario["opinion_fecha"] ?>
              </span>
            </div>
            <div class="card-body">
              <?= $comentario["opnion_comentario"] ?>
            </div><!-- /panel-body -->
          </div><!-- /panel panel-default -->
        </div><!-- /col-sm-5 -->
      <?php endforeach; ?>

      </div>
      <hr>
      <!--Fin de card centro recolecion-->
      <div class="row" id="card_comentario">
        <div class="col-md-6">
          <input type="hidden" name="idc" id="idc" value="<?= $Sessions->get("id")?>">
          <input type="hidden" name="" id="email" value="<?= $Sessions->get("email") ?>">
          <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
              <form>
                <div class="form-group">
                  <textarea class="form-control" rows="3" id="comentario"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" id="btnOpinion">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
<?php include '../templates/footer.php'; ?>
