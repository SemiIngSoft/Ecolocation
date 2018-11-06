<?php
function get_user_request()
{
    include 'C:/xampp/htdocs/Ecolocation-master/test_conection/Conect.php';
    $conexion    = OpenCon();
    $idCiudadano = 1;
    
    $sql = "SELECT * FROM ciudadano WHERE (id = $idCiudadano)";
    if (!$conexion) {
        echo "Error de Csonexion";
    }
    $result = $conexion->query($sql);  
    $data = mysqli_fetch_row($result);
    if ($result != NULL) {
        //echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
    
    CloseCon($conexion);
    return $data;
}
?>