<?php
  include '../php/clases/Sessions.php';
  //session_start();
  //Sessions::set("name", "jesse");
  $Sessions = new Sessions();
  $Sessions->start();
  $Sessions->verify_session();
  include '../php/functions/get_user_for_request.php';
  $informacion_usuario = get_user_request($Sessions->get("id"))[0];
 ?>
<?php include '../templates/header.php'; ?>
<body>

  <div class="configuraciones">

  </div>
  <!-- Page Content -->
  <div class="container mt-4 mb-4">
    <div class="col-lg-8 mx-auto">
      <div class="card">
        <h5 class="card-header  white-text text-center py-4 msu-green" >
          <strong>Peticion de recoleccion</strong>
        </h5>
        <div class="card-body px-lg-5 pt-0 ">
          <form style="color: #757575;">
            <!-- Linea Uno -->
            <div class="md-form form-group col-md-12">
              <i class="far fa-user prefix"></i>
              <input type="text" id="pnombre" name="pnombre" class="form-control" value="<?= $informacion_usuario["nombre"] ?>"
              >
              <label for="pnombre">Nombre: </label>
            </div>
            <div class="md-form form-group col-md-12">
              <i class="far fa-user prefix"></i>
              <input type="text" id="apellidoPaterno" name="apellidoPaterno" class="form-control" value="<?= $informacion_usuario["apellidoPaterno"]?>"
              >
              <label for="apellidoPaterno">Apellido Paterno</label>
            </div>

            <div class="md-form form-group col-md-12">
              <i class="far fa-user prefix"></i>
              <input type="text" id="apellidoMaterno" name="apellidoMaterno" class="form-control" value="<?= $informacion_usuario["apellidoMaterno"]?>"
              >
              <label for="apellidoMaterno">Apellido Materno</label>
            </div>
            <div class="md-form form-group col-md-12">
              <i class="fas fa-mobile-alt prefix"></i>
              <input type="number" id="telefono" name="telfono" class="form-control" value="<?= $informacion_usuario["telefono"] ?>"
              >

              <label for="telefono">Numero de Telefono</label>
            </div>
            <div class="md-form form-group col-md-12">
              <i class="fas fa-map-marked-alt prefix"></i>
              <input class="d-block" type="text" id="calle" name="calle" class="form-control" value="<?= $informacion_usuario["domicilio"] ?>"
              readonly
              >
              <i class="fas fa-map-marked-alt prefix"></i>
              <input type="hidden" id="geolocation" name="geolocation" value="<?=  $informacion_usuario["ubicacion"] ?>">
              <button type="button" class="btn btn-primary map">Mapa</button>
              <button class="btn btn-success d-none" id="btnG">
                <i class="fas fa-map-marked-alt"></i>
              </button>
              <small id="add" class="d-block d-none">
                *Presiona el boton verde para que obtengamos tu domicilio
              </small>
              <div class="card d-none">
                <div id="map" class="z-depth-1 d-none" style="height: 500px">
                </div>
              </div>
              <label for="materialRequestFormLocalitation"> Localizacion: </label>
            </div>
            <div class="md-form form-group">
              <button type="submit" id="btnGuardar" class="btn btn-success" data-toggle="modal" data-target="#pedidoModal">
                <i class="fa fa-paper-plane fa-lg"></i>
                Guardar Cambio
              </button>
            </div>


            <div class="form-row">
            </div>

            <!-- Linea Dos-->
            <div class="form-row">

            </div>
            <!--Linea Tres - Descripcion del pedido-->
            <!--Linea Cuatro - Fecha de Recolecion-->
            <!--Linea Cinco - Boton de pedido-->
            <div class="form-row justify-content-center">

            </div>
            <!-- Modal - Descargar pedido -->
            <!-- Fin Pedido modal-->
          </form>
        </div>
      </div>
    </div>
  </div>
      <?php include '../templates/footer.php'; ?>
