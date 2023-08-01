<?php
require_once '../peticiones.php';
session_start();
error_reporting (E_ALL ^ E_NOTICE);
if(isset($_POST['like'])){
  $id = $_POST['id'];
  $sqlClm = "SELECT COUNT(*) FROM `like` WHERE id_p = '$id' AND id_u = '".$_SESSION['idu']."';";
  $resulClm = $conexion->query($sqlClm);
  if($resulClm->fetchColumn()>0){
    $sqlDel = "DELETE FROM `like` WHERE id_u = '".$_SESSION['idu']."' AND id_p = '$id';";
    $resultDel = $conexion->exec($sqlDel);
  }
  else{
    $sqlAdd = "INSERT INTO `like` (id_u,id_p) VALUES ('".$_SESSION['idu']."', '$id');";
    $resultIns = $conexion->exec($sqlAdd);
  }
}

?>
