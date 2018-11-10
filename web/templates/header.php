<!DOCTYPE html>
<html>

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
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.min.js">

  </script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
        <ul class="navbar-nav ml-auto" id='nav'>
          <li class="nav-item active">
            <a class="nav-link" href="../ecolocation/welcome.php">Home
              <span class="sr-only">(current)  </span>
            </a>
          </li>
          <!--<li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>-->
          <!--<li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>-->

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Mi Cuenta
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="../ecolocation/configuraciones.php">Configuraciones</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../php/functions/logout.php">LogOut</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <?php

  $crumbs = explode("/",$_SERVER["REQUEST_URI"]);
  $array_crumb = [];
  foreach($crumbs as $crumb){
      $array_crumb[] =ucfirst(str_replace(array(".php","_"),array(""," "),$crumb) . ' ');
    }
  ?>
