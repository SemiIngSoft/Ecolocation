<?php

function get_centro($id){
  $conexion = new Conexion();
  $cnn = $conexion->getConexion();
  $sql = "SELECT * FROM centroderecoleccion WHERE id = (:id) LIMIT 1";
  $q = $cnn -> prepare($sql);
  $q -> bindValue(":id", $id, PDO::PARAM_STR);
  $q -> execute();
  $centros = $q -> fetch(PDO::FETCH_ASSOC);
  return $centros;
}


 ?>
