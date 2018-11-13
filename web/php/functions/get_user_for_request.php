<?php
function get_user_request($id)
{
    include '../php/clases/Conexion.php';
    $conexion = new Conexion();
    $cnn = $conexion->getConexion();
    $sql = "SELECT id, nombre, apellidoPaterno, apellidoMaterno, ubicacion, domicilio, telefono FROM ciudadano WHERE id = (:id)";
    $q = $cnn -> prepare($sql);
    $q -> bindValue(":id", $id, PDO::PARAM_INT);
    $q -> execute();
    $centros = $q -> fetchAll(PDO::FETCH_ASSOC);
    return $centros;
}
?>
