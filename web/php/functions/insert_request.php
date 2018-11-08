<?php
function insert_request()
{
  include '../php/clases/Conexion.php';
  $conexion = new Conexion();
  $cnn = $conexion->getConexion();

  $sql = "INSERT
          INTO
              peticion(
                  descripcion,
                  fecha,
                  estado,
                  idCentroDeRecoleccion,
                  IdCiudadano
              )
          VALUES((:descripcion), (:fecha), (:estado), (:idCentroDeRecoleccion), (:IdCiudadano))";
    if (!$conexion) {
        echo "Error de Conexion";
    }
    if ($conexion->query($sql) === TRUE) {
        //echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    CloseCon($conexion);
    /*
    $q = $cnn -> prepare($sql);
    $q -> bindValue(":descrip", $descrip, PDO::PARAM_STR);
    $q -> bindValue(":fecha", $fecha, PDO::PARAM_STR);
    $q -> bindValue(":idCentro", $idCentro, PDO::PARAM_INT);
    $q -> bindValue(":idCiudadano", $idCiudadano, PDO::PARAM_INT);
    $q -> execute();
    */
}
$cn = insert_request();
?>
