
<?php
  include '../php/clases/Sessions.php';
  //session_start();
  //Sessions::set("name", "jesse");
  $Sessions = new Sessions();
  $Sessions->start();
  $Sessions->verify_session();
  /*
  echo $Sessions->get("nombre");
  echo $Sessions->get("codigo");
  echo $Sessions->get("carrera");
  echo "<br>";

  echo $Sessions->get("ultimaAct");
  */
 ?>
<?php include '../templates/header.php'; ?>
<!--Contenido-->
<div class="container mt3" >
  <div class="row">
    <div class="col-lg-6 ">
      <div class="card">
        <div class="card-header text-center">
          Solicitar Recoleccion
        </div>
        <div class="card-title text-center">
          <p >Haz click en la imagen para hacer un pedido</<p>
        </div>
        <div class="mx-auto d-block">
          <a href="pedido.php">
            <img src="../img/garbage-truck.svg" style="width: 300px; height: 300px;">
          </a>
        </div>
      </div>
    </div>
    <div class="col-lg-6 ">
      <div class="card">
        <div class="card-header text-center">
          Ver Centros De Recoleccion
        </div>
        <div class="card-title text-center">
          <p >Haz click en la imagen ver centro de recolección</<p>
        </div>
        <div class="mx-auto d-block">
          <a href="centros.php">
            <img src=" ../img/map.svg" class="" alt="" style="width: 300px; height: 300px;">
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
<?php include '../templates/footer.php'; ?>
