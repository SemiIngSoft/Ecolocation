
<?php
  require_once('../php/clases/Sessions.php');
  //session_start();
  //Sessions::set("name", "jesse");
  $Sessions = new Sessions();
  $Sessions->start();
  $Sessions->verify_session();
  require_once ('../php/functions/get_pedidos.php');
  $array_pedidos = get_pedidos();
  //var_dump($array_pedidos);
  $done = (isset($_GET["done"])) ? true : false ;
 ?>
<?php include '../templates/header.php'; ?>
<div class="pedidohistorico">

</div>
<!--Contenido-->
  <div class="container mt-3" style="background-color: white;">
    <div class="row mt-5">
      <div class="col-md-12 mt-3">
        <?php if ($done): ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Tú pedido fue exito</strong> en breve iremos por tu basura.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>
        <div class="data mb-5">
          <h5>Historico de pedidos del ciudadano: <strong><?=$Sessions->get("nombre")?></strong></h5>
        </div>
        <table class="table table-hover table-bordered"  id="example" style="background-color: white;">
          <thead class="thead-light">
            <tr>
              <th scope="col"><strong>#</strong></th>
              <th scope="col"><strong>ID</strong></th>
              <th scope="col"><strong>Fecha</strong></th>
              <th scope="col"><strong>Informacion</strong> <small>* Haz click para ver mas informacion</small></th>
            </tr>
          </thead>
          <?php $i = 0; ?>
          <?php foreach ($array_pedidos as $pedido ): ?>
          <tbody>
            <tr>
              <th scope="row"><?php echo $i = $i +1 ?></th>
              <td> <?= $pedido["id"]; ?> </td>
              <td><?= $pedido["fecha"]; ?></td>
              <td>
              <button type="button" class="btn btn-primary open-modal"  id="btnInformacion">
                Informacion
              </button>
              </td>
            </tr>
          </tbody>
          <?php endforeach; ?>
        </table>

        <div class="modal fade" id="modal-infoC" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Info de pedido</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="info">

                  <div class="map z-depth-1"  style="height: 300px" id="map" >
                  </div>
                  <div>
                    <b class="idPedido" ># Pedido: </b>
                  </div>
                  <div>
                    <b class="fecha">Fecha: </b>
                  </div>
                  <div>
                    <b class="domicilio">Domicilio: </b>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" >Close</button>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>


<?php include '../templates/footer.php'; ?>
