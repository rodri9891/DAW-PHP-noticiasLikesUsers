<?php
session_start();
require_once '../peticiones.php';

error_reporting (E_ALL ^ E_NOTICE);

  if(isset($_POST['showlike'])){
    $id = $_POST['id'];
    $sqlSh = "SELECT COUNT(*) FROM `like` WHERE id_p = '$id';";
    $resultSh = $conexion->query($sqlSh);
    echo $resultSh->fetchColumn();
  }

?>
