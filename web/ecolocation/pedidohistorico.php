
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
  <div class="container mt-3" style="background-color: white;">
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="data mb-5">
          <h5>Historico de pedidos del ciudadano: <strong>Juan Pablo Perez</strong></h5>
        </div>
        <table class="table table-hover table-bordered" style="background-color: white;">
          <thead class="thead-light">
            <tr>
              <th scope="col"><strong>#</strong></th>
              <th scope="col"><strong>ID</strong></th>
              <th scope="col"><strong>Fecha</strong></th>
              <th scope="col"><strong>Informacion</strong></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>454545</td>
              <td>01/11/18</td>
              <td>
              <button class="btn btn-primary">
                Informacion
              </button>
              </td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <th scope="row">2</th>
              <td>454545</td>
              <td>01/11/18</td>
              <td>
              <button class="btn btn-primary">
                Informacion
              </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>


<?php include '../templates/footer.php'; ?>
