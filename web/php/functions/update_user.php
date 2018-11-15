<?php
  include '../clases/Sessions.php';
  include '../clases/Conexion.php';
  $conexion = new Conexion();
  $cnn = $conexion->getConexion();
  //session_start();
  //Sessions::set("name", "jesse");
  $Sessions = new Sessions();
  $Sessions->start();
  $Sessions->verify_session();
  $id = $Sessions->get("id");
  $nombre = $_POST["nombre"];
  $apellidoPaterno = $_POST["apellidoPaterno"];
  $apellidoMaterno = $_POST["apellidoMaterno"];
  $telefono = $_POST["telefono"];
  $calle = $_POST["calle"];
  $ubicacion = $_POST["geolocation"];
  $sql = "UPDATE
          ciudadano
          SET
          nombre = (:nombre),
          apellidoPaterno = (:apellidoPaterno),
          apellidoMaterno = (:apellidoMaterno),
          ubicacion = (:ubicacion),
          domicilio = (:domicilio),
          telefono = (:telefono)
          WHERE
          id = (:id)";
  $q = $cnn -> prepare($sql);
  $q -> bindValue(":nombre", $nombre, PDO::PARAM_STR);
  $q -> bindValue(":apellidoPaterno", $apellidoPaterno, PDO::PARAM_STR);
  $q -> bindValue(":apellidoMaterno", $apellidoMaterno, PDO::PARAM_STR);
  $q -> bindValue(":ubicacion", $ubicacion,PDO::PARAM_STR);
  $q -> bindValue(":domicilio", $calle, PDO::PARAM_STR);
  $q -> bindValue(":telefono", $telefono, PDO::PARAM_STR);
  $q -> bindValue(":id", $id, PDO::PARAM_INT);
  $q -> execute();
  $rowCount = $q -> rowCount();
  if ($rowCount == 0) {
    echo "0";
  }else{
    echo "1";
  }



 ?>
