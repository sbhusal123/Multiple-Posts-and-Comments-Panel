<?php 
session_start();
$id=$_POST["id"];
$_SESSION["com_id"]=$id;
echo $id;

 ?>