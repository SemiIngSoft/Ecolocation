<?php
  $centroID = $_GET["id"];


 ?>
<!DOCTYPE html>
<html >

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Opiniones de centros de recolecion</title>

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
  <!-- JQuery -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Custom styles for this template -->
  <link href="../css/heroic-features.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
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
<!--Contenido-->
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
                    <p class="lead"> Centro de oblatos
                      <?= $centroID; ?>
                    </p>
                    <p><strong>Domicilio: </strong> afmasmfksamklf</p>
                    <p><strong>Telefono: </strong> 33-15-45-46</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 ">
                <div class="card">
                  <div id="mapId" value="<?= $centroID ?>" hidden></div>
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
      <div class="col-sm-8 my-2">
        <div class="card ">
          <div class="card-header">
            <strong>myusername</strong> <span class="text-muted">commented 5 days ago</span>
          </div>
          <div class="card-body">
            Panel content
          </div><!-- /panel-body -->
        </div><!-- /panel panel-default -->
      </div><!-- /col-sm-5 -->
      </div>
      <hr>
      <!--Fin de card centro recolecion-->
      <div class="row" id="card_comentario">
        <div class="col-md-6">


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
    <!--fin container-->
    <!--.fin del contenido -->
    <!-- Footer -->
    <footer class="footer my-5 py-5 bg-dark">
      <div class="container">
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



    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.11/js/mdb.min.js"></script>


    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_nzqNDBfJopGdzH2sNBbgHS-iotxkN_c"> //&callback=initMap
    </script>
    <script src="js/app.js"></script>
    <script>
    var map;
    /*function initMap() {
      map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: -34.397, lng: 150.644},
        zoom: 8
      });
    }*/

    </script>
    <script type="text/javascript">


    </script>
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
