<?php
  include '../clases/Conexion.php';
  function check_user($user_info)
  {
    $conexion = new Conexion();
    $cnn = $conexion->getConexion();
    $email = $user_info["email"];
    $password = $user_info["password"];
    $sql = "SELECT
              *
            FROM ciudadano
            WHERE correo = (:email)";
    $q = $cnn -> prepare($sql);
    $q -> bindValue(":email", $email, PDO::PARAM_STR);
    //$q -> bindValue(":password", $password, PDO::PARAM_STR);
    $q -> execute();
    $result = $q -> fetch(PDO::FETCH_ASSOC);
    if (empty($result)){
      return 1;
    }
    if (!password_verify($password,$result["password"])){
      return 1;
    }else{
      include '../clases/Sessions.php';
      //session_start();
      $Sessions = new Sessions();
      $Sessions->start();
      $ciudadano_info = [
                        "id" => $result["id"],
                        "nombre" => $result["nombre"],
                        "apellidoPaterno" => $result["apellidoPaterno"],
                        "apellidoMaterno" => $result["apellidoMaterno"],
                        "email" => $email
                        ];
      $Sessions->set($ciudadano_info);
      /*
      echo $Sessions->get("nombre");
      echo $Sessions->get("codigo");
      echo $Sessions->get("carrera");
      echo "<br>";
      echo $Sessions->get("ultimaAct");
      */
      return 0;
    }
  }

echo check_user($_POST);
