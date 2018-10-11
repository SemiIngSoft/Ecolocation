<?php
 
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "ecolocation";
 
 
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>


<?php
 
$conn = OpenCon();
 
echo "Connected Successfully";

$query="SELECT id,nombre,ubicacion,domicilio FROM centroderecoleccion";
$result=$conn->query($query);
echo "<br><br>Tabla Centros de Recoleccion";
while($row=$result->fetch_assoc()){
    echo "<br><br>ID:  ".$row["id"]."<br>Nombre:  ".$row["nombre"]."<br>Ubicacion:  ".$row["ubicacion"]."<br>Domicilio:  ".$row["domicilio"]."<br>";
           }


$query="SELECT id,descripcion FROM peticion";
$result=$conn->query($query);
echo "<br><br>Tabla Peticion";
while($row=$result->fetch_assoc()){
    echo "<br><br>ID:  ".$row["id"]."<br>Decripcion:  ".$row["descripcion"];
           }
     
CloseCon($conn);
 
?>
