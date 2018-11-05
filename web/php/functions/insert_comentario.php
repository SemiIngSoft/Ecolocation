<?php
function insertar_comentario($campos){
  include '../clases/Conexion.php';
  $conexion = new Conexion();
  $cnn = $conexion->getConexion();
  $comentario = $campos["comentario"];
  //$fecha = $campos["fecha"];
  $idCentroRecoleccion = $campos["idCentroRecoleccion"];
  $idCiudadano = $campos["idCiudadano"];
  $sql = "INSERT INTO opinion(comentario, idCentroRecoleccion, idCiudadano)
          VALUES (:comentario, :idCentroRecoleccion, :idCiudadano)";
  $q = $cnn -> prepare($sql);
  $q -> bindValue(":comentario", $comentario, PDO::PARAM_STR);
  //$q -> bindValue(":fecha", $fecha, PDO::PARAM_STR);
  $q -> bindValue(":idCentroRecoleccion", $idCentroRecoleccion, PDO::PARAM_INT);
  $q -> bindValue(":idCiudadano", $idCiudadano, PDO::PARAM_INT);

  echo $q -> execute();
}

insertar_comentario($_POST);



 ?>
