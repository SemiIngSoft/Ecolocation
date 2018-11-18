<?php
function get_pedidos(){
  //include '../php/clases/Sessions.php';
  $Sessions = new Sessions();
  $Sessions->start();
  $Sessions->verify_session();
  $idCiudadano = $Sessions->get("id");
  include '../php/clases/Conexion.php';
  $conexion = new Conexion();
  $cnn = $conexion->getConexion();
  $sql = "SELECT * FROM peticion WHERE idCiudadano = (:idCiudadano)";
  $q = $cnn -> prepare($sql);
  $q -> bindValue(":idCiudadano", $idCiudadano, PDO::PARAM_INT);
  $q -> execute();
  $res = $q -> fetchAll(PDO::FETCH_NAMED);
  return( $res);
}


 ?>
