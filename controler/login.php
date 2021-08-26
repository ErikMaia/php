<?php
require("../model/users.php");

function login(){
   session_start();
   $email = $_POST["email"];
   $pass = $_POST["pass"];

   if(isset($email)&&isset($pass)){
      $users = new Users();
      $response = $users->getOne($email, $pass);
      if(isset($response)){
         $_SESSION["email"] = $email;
         $_SESSION["id"] = $response[0]->id;
         return true;
      }
   }
   return false;
}
?>