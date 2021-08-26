<?php
require("../model/users.php");

function signin(){
   session_start();
   $user = $_POST["user"];
   $email = $_POST["email"];
   $pass = $_POST["pass"];

   if(isset($email)&&isset($pass)){
      try{
         $users = new Users();
         $response = $users->create($user,$email,$pass);
         if(isset($response)){
            $_SESSION["email"] = $email;
            $_SESSION["id"] = $response[0]->id;
            return true;
         }
      }
      catch(Exception $e){
         print($e);
      }
   }
   return false;
}
?>