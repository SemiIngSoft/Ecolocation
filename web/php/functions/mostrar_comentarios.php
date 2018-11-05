<?php
  include '../php/clases/Conexion.php';
  function mostrar_comentarios($id_centro_recoleccion){
    $conexion = new Conexion();
    $cnn = $conexion->getConexion();
    $sql = "SELECT
      ciudadano.id AS ciudadano_id,
      ciudadano.correo AS ciudadano_correo,
      opinion.id AS opinion_id,
      centroderecoleccion.nombre AS centro_nombre,
      centroderecoleccion.domicilio AS centro_domicilio,
      opinion.comentario AS opnion_comentario,
      opinion.fecha AS opinion_fecha,
      opinion.idCentroRecoleccion AS id_centro
    FROM
        opinion
    INNER JOIN
        ciudadano
    ON
        opinion.idCiudadano = ciudadano.id
    INNER JOIN
        centroderecoleccion
    ON
        opinion.idCentroRecoleccion = centroderecoleccion.id
    WHERE
      opinion.idCentroRecoleccion = (:id_centro_recoleccion)";
    $q = $cnn -> prepare($sql);
    $q -> bindValue(":id_centro_recoleccion", $id_centro_recoleccion, PDO::PARAM_INT);
    $q -> execute();
    $result  =  $q -> fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }


 ?>
