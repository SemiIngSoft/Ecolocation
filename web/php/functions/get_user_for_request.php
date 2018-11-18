<?php
function get_user_request($id)
{
    include '../php/clases/Conexion.php';
    $conexion = new Conexion();
    $cnn = $conexion->getConexion();
    $sql = "SELECT
    ciudadano.id,
    ciudadano.nombre,
    ciudadano.id_centro,
    ciudadano.apellidoPaterno,
    ciudadano.apellidoMaterno,
    ciudadano.ubicacion,
    ciudadano.domicilio,
    ciudadano.telefono,
    centroderecoleccion.nombre AS centro_fav
FROM
    ciudadano
INNER JOIN
    centroderecoleccion
ON
    centroderecoleccion.id = ciudadano.id_centro
WHERE
    ciudadano.id = (:id)";
    $q = $cnn -> prepare($sql);
    $q -> bindValue(":id", $id, PDO::PARAM_INT);
    $q -> execute();
    $centros = $q -> fetchAll(PDO::FETCH_ASSOC);
    return $centros;
}
?>
