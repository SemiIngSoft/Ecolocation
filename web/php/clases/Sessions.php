<?php

 class Sessions
 {
   private static $_sessionStarted = false;
   public function start()
   {

     if(self::$_sessionStarted == false){
       session_start();

       self::$_sessionStarted = true;
     }
   }
   public function  set($alumno_info)
   {
     foreach ($alumno_info as $key => $value) {
       $_SESSION[$key] = $value;
     }
     $_SESSION['ultimaAct']   = time();

   }
   public static function get($key)
   {

      if (isset($_SESSION[$key])) {
        return $_SESSION[$key];
      }else{
        return false;
      }
   }
   public function verify_session()
   {
     //$_SESSION['ultimaAct'] = time();
     if(!$_SESSION){
        echo "Tienes que Iniciar session";
        die();
     }else{

       if((time() - $_SESSION['ultimaAct']) > 5000){
         session_destroy();
         die("<div class='card'>
                <h2>Se Destruyo la session papu</h2>
              <div>");
         header("Location: index.html");
       }else{
        // $_SESSION["nombre"] =  $_SESSION["nombre"];
        // $_SESSION["codigo"] = $_SESSION["codigo"];
         //$_SESSION["carrera"] = $_SESSION["carrera"];
         $_SESSION['ultimaAct'] = time();

       }
     }
   }
 }

 ?>
