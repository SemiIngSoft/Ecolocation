<?php

  function get_centros(){
    //include '../clases/Conexion.php';
    $conexion = new Conexion();
    $cnn = $conexion->getConexion();
    $sql = "SELECT id, ubicacion FROM centroderecoleccion";
    $q = $cnn -> prepare($sql);
    $q -> execute();
    $centros = $q -> fetchAll(PDO::FETCH_ASSOC);
    return $centros;
  }

 ?>
