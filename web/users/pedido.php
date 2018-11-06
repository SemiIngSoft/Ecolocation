<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Heroic Features - Start Bootstrap Template</title>
      <!-- Bootstrap core CSS -->
      <!--<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
      <!-- Font Awesome -->
      <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->
      <!-- Bootstrap core CSS -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
      <!-- Material Design Bootstrap -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.11/css/mdb.min.css" rel="stylesheet">
      <!-- Font awesome -->
      <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js" integrity="sha384-kW+oWsYx3YpxvjtZjFXqazFpA7UP/MbiY4jvs+RWZo2+N94PFZ36T6TFkc9O3qoB" crossorigin="anonymous"></script>
      <!-- Custom styles for this template -->
      <link href="../css/heroic-features.css" rel="stylesheet">
   </head>
   <body>
      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
         <!--<nav class="navbar navbar-expand-lg fixed-top navbar-green">-->
         <div class="container">
            <a class="navbar-brand" href="#">Ecolocation</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item active">
                     <a class="nav-link" href="#">Home
                     <span class="sr-only">(current)</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#">About</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#">Services</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#">Contact</a>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
       
      <!--User Data-->   
       <?php
       include 'C:/xampp/htdocs/Ecolocation-master/web/php/functions/get_user_for_request.php';
       $row = get_user_request();
       ?>   
      
       
       <!-- Page Content -->
      <div class="container mt-4 mb-4">
         <div class="col-lg-8 mx-auto">
            <div class="card">
               <h5 class="card-header info-color white-text text-center py-4"> <strong>Order of collection</strong> </h5>
               <div class="card-body px-lg-5 pt-0" >
                  <form style="color: #757575;" method="POST" action="/Ecolocation-master/web/php/functions/insert_request.php">
                     <!-- Linea Uno -->
                     <div class="form-row">
                        <div class="md-form form-group col-md-6">
                           <i class="far fa-user prefix"></i>
                           <input type="text" id="materialRegisterFormFirstName" name = "pnombre" class="form-control" value="<?php echo $row[1]; ?>" disabled> 
                           <label for="materialRegisterFormFirstName">First name</label>
                        </div>
                        <div class="md-form form-group col-md-6">
                           <i class="far fa-user prefix"></i>
                           <input type="text" id="materialRegisterFormLastName" name="apellidos" class="form-control" value="<?php echo $row[2]; ?>" disabled>
                           <label for="materialRegisterFormLastName">Last name</label>
                        </div>
                     </div>
                     <!-- Linea Dos-->
                     <div class="form-row">
                        <div class="md-form form-group col-md-6">
                           <i class="fas fa-mobile-alt prefix"></i>
                           <input type="email" id="materialRegisterFormEmail" name="phoneNumber" class="form-control" value="<?php echo $row[6]; ?>" disabled>
                           <label for="materialRegisterFormEmail">Phone Number</label>
                        </div>
                        <div class="md-form form-group col-md-6">
                           <i class="fas fa-map-marked-alt prefix"></i>
                           <input type="text" id="materialRequestFormLocalitation" name="materialRequestFormLocalitation"class="form-control" ariadescribedby="materialRequestFormLocalitation" value="<?php echo $row[5]; ?>" disabled>
                           <label for="materialRequestFormLocalitation"> Localization</label>
                        </div>
                     </div>
                     <!--Linea Tres - Descripcion del pedido-->
                     <div class="form-row">
                        <div class="md-form form-group col-md-12">
                           <i class="fas fa-envelope-open-text prefix" style="color:#757575"></i>
                           <textarea rows="5" id="descriptionFormRequest" name="descriptionFormRequest" style="resize:none">
                           </textarea>
                             <label for="descriptionFormRequest" style="font-size:100%">Description of Collection Order</label>
                        </div>
                     </div>
                     <!--Linea Cuatro - Fecha de Recolecion-->
                     <div class="form-row justify-content-center">
                        <div class="md-form form-group col-md-6 ">
                           <i class="far fa-calendar-alt prefix"></i>
                           <input type="date" id="materialRequestFormDate" name="materialRequestFormDate" class="form-control" value="<?php echo date("Y-n-d"); ?>" aria-describedby="materialRequestFormDate" required>
                        </div>
                     </div>
                     <!--Linea Cinco - Boton de pedido-->
                     <div class="form-row justify-content-center">
                        <div class="md-form form-group">
                           <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-paper-plane fa-lg"></i> Make an Order</button>
                        </div>
                     </div>
                     <!-- Modal - Descargar pedido -->
                     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Descargar Formulario de Pedido</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 <!--...-->
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 <button type="button" class="btn btn-primary"><i class="fas fa-file-download fa-lg"></i> Download</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
       
      <!-- Footer -->
      <footer class="footer py-5 bg-dark">
         <div class="container ">
            <p class="m-0 text-center text-white">Copyright &copy; Ecolocation 2018</p>
         </div>
         <!-- /.container -->
      </footer>
      <!-- Google Maps Map -->
      <!--
         <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_nzqNDBfJopGdzH2sNBbgHS-iotxkN_c&callback=initMap" async defer></script>
         -->
      <!-- Bootstrap core JavaScript -->
      <!--<script src="../vendor/jquery/query.min.js"></script>-->
      <!--
         <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
         -->
      <!-- JQuery -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <!-- Bootstrap tooltips -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
      <!-- Bootstrap core JavaScript -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
      <!-- MDB core JavaScript -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.11/js/mdb.min.js"></script>
      <script async defer
         src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_nzqNDBfJopGdzH2sNBbgHS-iotxkN_c&callback=initMap"></script>
      <script  src="../js/app.js"></script>
      <!--
         <script>
           var map;
         
           function initMap() {
             map = new google.maps.Map(document.getElementById('map'), {
               center: {
                 lat: -34.397,
                 lng: 150.644
               },
               zoom: 8
             });
           }
         </script>-->
   </body>
</html>