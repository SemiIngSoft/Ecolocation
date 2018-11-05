<?php
  $valid = 0;
  $email = $_POST["email"];
  include '../clases/Conexion.php';
  $conexion = new Conexion();
  $cnn = $conexion->getConexion();
  $sql = "SELECT COUNT(*) FROM ciudadano WHERE correo = (:correo)";
  $q = $cnn -> prepare($sql);
  $q -> bindValue(":correo", $email, PDO::PARAM_STR);
  $q -> execute();
  $result_email = $q -> fetch(PDO::FETCH_NUM);
  if (intval($result_email[0]) > 0){
    $valid = 1;
  }
  echo json_encode($valid);



 ?>
