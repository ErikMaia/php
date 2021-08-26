<?php
require("../model/livros.php");
function getAll(){
   $livros = new Livros();
   $response = $livros->getAll();
   return $response;
}
?>