<?php
require_once ('../clases/Sessions.php');
//session_start();
//Sessions::set("name", "jesse");
$Sessions = new Sessions();
$Sessions->start();
$Sessions->verify_session();
$idCiudadano = $Sessions->get("id");
// $idCentroDeRecoleccion = $_POST["idCentroDeRecoleccion"];
$idPedido = $_POST["idPedido"];
include '../clases/Conexion.php';
$conexion = new Conexion();
$cnn = $conexion->getConexion();
$sql = "SELECT
    ciudadano.nombre AS nombre_ciudadano,
    ciudadano.apellidoPaterno AS apellidoP_ciudadano,
    ciudadano.apellidoMaterno AS apellidoM_ciudadano,
    ciudadano.ubicacion AS ubicacion_ciudadano,
    ciudadano.domicilio AS domicilio_ciuddano,
    peticion.id AS id_peticion,
    peticion.descripcion AS descripcion_peticion,
    peticion.fecha AS fecha_peticion,
    centroderecoleccion.nombre AS nombre_centro,
    centroderecoleccion.ubicacion AS ubicacion_centro,
    centroderecoleccion.domicilio  AS domicilio_centro

FROM
    peticion
INNER JOIN
    centroderecoleccion
ON
    peticion.idCentroDeRecoleccion = centroderecoleccion.id

INNER JOIN
    ciudadano
ON
    ciudadano.id = peticion.idCiudadano

WHERE
    peticion.id = (:idPeticion)
";
$q  = $cnn -> prepare($sql);
$q -> bindValue(":idPeticion", $idPedido, PDO::PARAM_INT);
$q -> execute();
$resultado =  $q -> fetchAll(PDO::FETCH_NAMED);
$json = json_encode($resultado);
echo $json;
 ?>
