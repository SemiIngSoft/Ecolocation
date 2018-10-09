<?php 
 class Conexion{
    private $host = "localhost";
    private $dbname = "ecolocation";
    private $user = "root";
    private $password = "nano199699";
    private $conexion = null;
    //private $char = array(\PDO::MYSQL_ATTR_INIT_COMMAND =>  'SET NAMES utf8',\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    private $options = array(\PDO::MYSQL_ATTR_INIT_COMMAND =>  'SET NAMES utf8',
   						  PDO::ATTR_ERRMODE,
   						  PDO::ERRMODE_EXCEPTION
   						);
        

    public function getConexion(){
      try{
        $this->conexion = new PDO(
                  "mysql:host=$this->host; dbname=$this->dbname",
                  $this->user,
                  $this->password,
                  $this->options
                  );
      return $this->conexion;
      }catch(Exception $e){
        echo $e->getMessage();
      }finally{
        $this->conexion = null;
      }
    }
  }
  	/** insercion a tabla de ciudadano */

  	echo "*****Insercion a ciudadano ******";


	$conexion = new Conexion();
	$cnn = $conexion->getConexion();
	$sql = "INSERT INTO ciudadano (nombre, apellidoPaterno,apellidoMaterno,ubicacion,domicilio,telefono,correo,password) VALUES('Mario','Jimenez','Mora','20.7049947,-103.32817690000002','Calle 7 Colinas 1772, Independencia, 44290 Guadalajara, Jal., Mexico','33-14-13-78-50','motorocool@gmail.com','$2y$12$1MfIIpZQ6HKjlhLMOqfyye.LY.5XqfNBaZAEiP.Ln7XlLGJB2Q.KO
');";

	
	$stmt = $cnn -> prepare($sql);
	echo $stmt->execute();
	$sql = "SELECT * FROM ciudadano";

	$stmt = $cnn -> prepare($sql);
	if ($stmt->execute()){
		$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
		foreach ($row as $ciudadano) {
			echo "<pre>";
			echo var_dump($ciudadano);

			//var_dump();
			echo "</pre>";
		}
		 /*while($row = $stmt -> fetchAll()){
		 	echo "<pre>";
		 	var_dump( $row[0]);*/
		 	/*echo "Id: ".$row["id"]." nombre: ".$row["nombre"]." apellido paterno ".$row["apellidoPaterno"]." Apellido materno ".$row["apellidoMaterno"]." ubicacion ".$row["ubicacion"]." domiciolio ". $row["domicilio"]. " telefono ". $row["telefono"]." correo ". $row["correo"]. " password ".$row["password"];*/
		 /*	echo "</pre>";
		 }*/
	}
	/**Insercion a tabla centro de centroderecoleccion*/
	echo "*****Insercion a centro de recoleccion ******";
	$conexion = new Conexion();
	$cnn = $conexion->getConexion();
	$sql = "INSERT INTO centroderecoleccion (nombre, ubicacion, domicilio) VALUES ('Centro Santa Anita','20.5502194,-103.44330560000003','Santa Anita #4444')";
	$stmt = $cnn->prepare($sql);
	$resultado = $stmt->execute();

	if ($resultado) {
		$sql = "SELECT * FROM centroderecoleccion ";
		$stmt  = $cnn -> prepare ($sql);
		$stmt -> execute();

		$row = $stmt -> fetchAll(PDO::FETCH_ASSOC);
		foreach ($row as $centro) {
			echo "<pre>";
		 	echo var_dump($row);
		 	echo "</pre>";
		 } 
	}
	





