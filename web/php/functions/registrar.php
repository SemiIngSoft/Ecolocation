<?php
  include '../clases/Conexion.php';
 function check_email($email)
 {
     #include '../clases/Conexion.php';
     $error = false;
     $conexion = new Conexion();
     $cnn = $conexion->getConexion();

     #var_dump($_POST);
     $sql = "SELECT COUNT(*) FROM ciudadano WHERE correo = (:correo)";
     $q = $cnn -> prepare($sql);
     $q -> bindValue(":correo", $email, PDO::PARAM_STR);
     $q -> execute();
     $result_email = $q -> fetch(PDO::FETCH_NUM);
     if (intval($result_email[0]) > 0){
       $error = true;
     }
     return $error;
 }
 function validar_registro($campos){
   $array_error = [];
   if (!isset($campos["pnombre"]) || $campos["pnombre"] == ""){
     $array_error ["error"][] = "Debes ingresar un nombre";
   }
   if (!isset($campos["apellidoP"]) || $campos["apellidoP"] == ""){
     $array_error ["error"][] = "Debes ingresar un apelldo paterno";
   }
   if (!isset($campos["apellidoM"]) || $campos["apellidoM"] == ""){
     $array_error ["error"][] = "Debes ingresar un apellido materno";
   }
   if (!isset($campos["email"]) || $campos["email"] == ""){
     $array_error ["error"][] = "Debes ingresar un email";
   }
   if (check_email($campos["email"]) == true) {
     $array_error ["error"][] = "Ese email ya esta registrado";
   }
   if (!isset($campos["password"]) || !isset($campos["passwordcon"]) ||
      $campos["password"] == "" || $campos["passwordcon"] = "" ||
      $campos["password"] != $campos["passwordcon"]){

        $array_error["error"][] = "Verifica los passwords";
   }
   if (!isset($campos["telefono"]) || $campos["telefono"] == ""){
     $array_error["error"][] = "Debes ingresar un telefono";
   }
   return $array_error;

 }
 function insertar_ciudadano($campos){

   $conexion = new Conexion();
   $cnn = $conexion->getConexion();
   //var_dump($_POST);

   $nombre = $campos["pnombre"];
   $apellidoP = $campos["apellidoP"];
   $apellidoM = $campos["apellidoM"];
   $email = $campos["email"];
   $password = password_hash($campos["password"], PASSWORD_DEFAULT);
   //$passwordCon = $campos["passwordcon"];
   $telefono = $campos["telefono"];
   $domicilio = $campos["calle"];
   $geolocation = $campos["geolocation"];
   $registro_validacion = validar_registro($campos);
   $centros = [];
   $min = [];
   $coordinates = explode(',' , $geolocation);
   include '../clases/CalculateDistance.php';
   include 'get_coordenadas.php';
   $json = get_centros();
   foreach($json as $coordenada ){
     $centros["ubicacion"][] = array($coordenada["ubicacion"]);
     $coordenadasCentro = explode(',', $coordenada["ubicacion"]);
     $CalculateDistance = new CalculateDistance();
     $min[] =  $CalculateDistance -> vincentyGreatCircleDistance($coordinates[0],$coordinates[1], $coordenadasCentro[0], $coordenadasCentro[1]);
   }
   $array_id=[];
   foreach ($json as $id) {
     $array_id['id'][] = $id["id"];
   }
   $array_id_coordenada= array_combine($array_id['id'], $min);
   $min_cen = array_keys($array_id_coordenada, min($array_id_coordenada));
   $centro_id =  $min_cen[0];
   if (!empty($registro_validacion)){
     echo json_encode($registro_validacion);
     return;
   }
   $sql = "INSERT INTO
           ciudadano (
               nombre,
               id_centro,
               apellidoPaterno,
               apellidoMaterno,
               ubicacion,
               domicilio,
               telefono,
               correo,
               password
           )
           VALUES (
               :nombre,
               :id_centro,
               :apellidoP,
               :apellidoM,
               :ubicacion,
               :domicilio,
               :telefono,
               :email,
               :password
               )
           ";
   $q = $cnn -> prepare($sql);

   $q -> bindValue(':nombre', $nombre, PDO::PARAM_STR);
   $q -> bindValue(':id_centro', $centro_id, PDO::PARAM_INT);
   $q -> bindValue(":apellidoP", $apellidoP, PDO::PARAM_STR);
   $q -> bindValue(":apellidoM", $apellidoM, PDO::PARAM_STR);
   $q -> bindValue(":ubicacion", $geolocation, PDO::PARAM_STR);
   $q -> bindValue(":domicilio", $domicilio, PDO::PARAM_STR);
   $q -> bindValue("telefono", $telefono, PDO::PARAM_STR);
   $q -> bindValue(":email", $email, PDO::PARAM_STR);
   $q -> bindValue(":password", $password, PDO::PARAM_STR);
   $q -> execute();
   echo '0';
   return;
 }

 insertar_ciudadano($_POST);
