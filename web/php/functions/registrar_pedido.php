<?php

include '../clases/Sessions.php';
//session_start();
//Sessions::set("name", "jesse");
$Sessions = new Sessions();
$Sessions->start();
$Sessions->verify_session();
$idCiudadano = $Sessions->get("id");
$pedidotext = $_POST["pedidotext"];
$fecha = $_POST["fecha"];
$estado = 1;
$idCentroDeRecoleccion = $_POST["id_centro"];
include '../clases/Conexion.php';
$conexion = new Conexion();
$cnn = $conexion->getConexion();
$sql = "INSERT
          peticion
          (descripcion, fecha, estado, idCentroDeRecoleccion, idCiudadano)
        VALUES ((:descripcion), (:fecha), (:estado), (:idCentroDeRecoleccion), (:idCiudadano))";
$q = $cnn -> prepare($sql);
$q -> bindValue(":descripcion", $pedidotext, PDO::PARAM_STR);
$q -> bindValue(":fecha", $fecha, PDO::PARAM_STR);
$q -> bindValue(":estado", $estado, PDO::PARAM_INT);
$q -> bindValue(":idCentroDeRecoleccion", $idCentroDeRecoleccion, PDO::PARAM_STR);
$q -> bindValue(":idCiudadano", $idCiudadano, PDO::PARAM_INT);
echo $q -> execute();

 ?>
