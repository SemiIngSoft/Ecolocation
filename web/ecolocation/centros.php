<?php include '../templates/header.php'; ?>
<?php
#include '../php/clases/Sessions.php';

#$Sessions = new Sessions();
#$Sessions->start();
#$Sessions->verify_session();


 ?>
  <div class="centros">
  </div>

<div class="container mt-5" >
  <div class="row">
    <div class="col-lg-12 ">
      <div class="card">
        <input type="hidden" name="" id="centrosview" >
        <!--<input type="hidden" id="mapId" value="<?= $centroID ?>">-->
        <div class="card-header">
          Centros de recoleccion disponibles.
        </div>
        <div class="card-title">
          <strong> * Seleccione uno de los puntos para ver opiniones de cada centro</strong>
        </div>
        <div class="card-body">
          <div id="map"  class="z-depth-1" style="height: 300px">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include '../templates/footer.php'; ?>
