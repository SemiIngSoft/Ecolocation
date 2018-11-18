<?php
  include '../php/clases/Sessions.php';
  //session_start();
  //Sessions::set("name", "jesse");
  $Sessions = new Sessions();
  $Sessions->start();
  $Sessions->verify_session();

 ?>
<?php include '../templates/header.php'; ?>

   <body>

      <!--User Data-->
       <?php
       include '../php/functions/get_user_for_request.php';
       $informacion_usuario = get_user_request($Sessions->get("id"))[0];
       //echo "<pre>";
       //var_dump($informacion_usuario);
       //echo "</pre>";
       ?>
       <div class="peticion">

       </div>

       <!-- Page Content -->
      <div class="container mt-4 mb-4">
         <div class="col-lg-8 mx-auto">
            <div class="card">
               <h5 class="card-header white-text text-center py-4 msu-green">
                 <strong>Peticion de recoleccion</strong>
               </h5>
               <div class="card-body px-lg-5 pt-0" >
                  <form style="color: #757575;">
                     <!-- Linea Uno -->
                     <div class="form-row">
                        <div class="md-form form-group col-md-6">
                           <i class="far fa-user prefix"></i>
                           <input type="text"
                            id="pnombre"
                            name = "pnombre"
                            class="form-control"
                            value="<?= $informacion_usuario["nombre"] ?>"
                            readonly>

                           <label for="materialRegisterFormFirstName">First name</label>
                        </div>
                        <div class="md-form form-group col-md-6">
                           <i class="far fa-user prefix"></i>
                           <input
                           type="text"
                           id="apellidos"
                           name="apellidos"
                           class="form-control"
                           value="<?= $informacion_usuario["apellidoPaterno"]?>"
                           readonly>

                           <label for="materialRegisterFormLastName">Last name</label>
                        </div>
                     </div>
                     <!-- Linea Dos-->
                     <div class="form-row">
                        <div class="md-form form-group col-md-6">
                           <i class="fas fa-mobile-alt prefix"></i>
                           <input
                           type="number"
                           id="telefono"
                           name="phoneNumber"
                           class="form-control"
                           value="<?= $informacion_usuario["telefono"] ?>"
                           readonly>

                           <label for="materialRegisterFormEmail">Phone Number</label>
                        </div>
                        <div class="md-form form-group col-md-6">
                           <i class="fas fa-map-marked-alt prefix"></i>
                           <input
                           type="text"
                           id="domicilio"
                           name="materialRequestFormLocalitation"
                           class="form-control"
                           ariadescribedby="materialRequestFormLocalitation"
                           value="<?= $informacion_usuario["domicilio"] ?>"
                           readonly>
                           <label for="materialRequestFormLocalitation"> Localization</label>
                           <input type="hidden" id="centro" value="<?=$informacion_usuario["id_centro"]?>">
                        </div>
                     </div>
                     <!--Linea Tres - Descripcion del pedido-->
                     <div class="form-row">
                        <div class="md-form form-group col-md-12">
                           <i class="fas fa-envelope-open-text prefix" style="color:#757575"></i>
                           <textarea
                           rows="5"
                           type="text"
                           id="pedidotext"
                           class="md-textarea form-control"
                           ></textarea>

                           <label
                           for="pedidotext"
                           >
                           Description of Collection Order
                          </label>
                        </div>
                     </div>
                     <!--Linea Cuatro - Fecha de Recolecion-->
                     <div class="form-row justify-content-center">
                        <div class="md-form form-group col-md-6 ">
                           <i class="far fa-calendar-alt prefix"></i>
                           <input
                           type="date"
                           id="fecha"
                           name="materialRequestFormDate"
                           class="form-control"
                           value="<?= date("Y-n-d"); ?>"
                           min="<?=  date("Y-n-d") ?>"
                           aria-describedby="materialRequestFormDate"
                           required>
                        </div>
                     </div>
                     <div class="form-row justify-content-center">
                       <div class="md-form form-group col-md-6">
                         <i class="fas fa-warehouse"></i>
                         <input type="text" name="centro_fav" id="centro_fav" value="<?= $informacion_usuario["centro_fav"] ?>">
                         <br>
                         <small class="text-danger">*Se eligio el mejor centro desde tu ubicacion*</small>
                         <label for="centro_fav">Centro de Recoleccion </label>

                       </div>
                     </div>

                     <!--Linea Cinco - Boton de pedido-->
                     <div class="form-row justify-content-center">
                        <div class="md-form form-group">
                           <button
                           type="submit"
                           id="btnPedido"
                           class="btn btn-success"
                           data-toggle="modal"
                           data-target="#pedidoModal">
                           <i class="fa fa-paper-plane fa-lg"></i>
                           Make an Order
                          </button>
                        </div>
                     </div>

                     <!-- Modal - Descargar pedido -->
                     <div class="modal fade" id="pedidoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                       <div class="modal-dialog" role="document">
                         <div class="modal-content">
                           <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalLabel">Descarga un PDF de tú pedido.</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                           <div class="modal-body">
                             Descarga Oprimiendo el boton.
                           </div>
                           <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                             <button type="button" id="btnDescargar" class="btn btn-primary">Descargar</button>
                           </div>
                         </div>
                       </div>
                      </div>
                     <!-- Fin Pedido modal-->
                  </form>
               </div>
            </div>
         </div>
      </div>

      <?php include '../templates/footer.php'; ?>
