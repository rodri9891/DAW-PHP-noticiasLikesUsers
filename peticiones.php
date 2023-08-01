<?php

  require_once 'conexion.php';
  error_reporting (E_ALL ^ E_NOTICE);
  session_start();

  // mostrar todos los posts
  $sql = "SELECT * FROM posteo;";
  $result = $conexion->query($sql);

  //todo de alta posteos
  if (isset($_POST['submitI'])){
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $nombreImg = $_FILES['imagen']['name'];
    $archivo = $_FILES['imagen']['tmp_name'];
    $tamanio = $_FILES['imagen']['size'];
    $tipo = $_FILES['imagen']['type'];
  //  $ruta = "uploaded"; // carpeta donde se guarda la imagen
    //$ruta = $ruta."/".$nombreImg; // carpeta destino + nombre de la img
    //move_uploaded_file($archivo, $ruta);
    if($tamanio<=5000000){ // imagen menor a 5 megas
      if($tipo == "image/jpeg" || $tipo == "image/jpg" || $tipo == "image/png" || $tipo == "image/gif"){


    $carpeta_destino =$_SERVER['DOCUMENT_ROOT'].'/imagen/uploaded/';
    move_uploaded_file($archivo, $carpeta_destino.$nombreImg);
    $sqlU = "INSERT INTO posteo VALUES ( NULL, '$titulo', '$descripcion', '$nombreImg', NULL, '".$_SESSION['idu']."');";
    $resultU = $conexion->exec($sqlU);
    // print($resultU." Filas afectadas");
    header("Refresh: 1; url=../imagen/vistas/alta-imagen.php");
    // echo "<p>Imagen guardada</p>";
    echo '<script>alert("Imagen guardada correctamente, continue..");</script>';
    }
    else {
      header("Refresh: 1; url=../imagen/vistas/alta-imagen.php");
      echo '<script>alert("Este formato no es aceptado, continue con JPEG/JPG/PNJ/GIF.");</script>';
    }
    }
    else{
      header("Refresh: 1; url=../imagen/vistas/alta-imagen.php");
      echo '<script>alert("Imagen es muy grande, continue con otra.");</script>';
    }
  }
  // alta-usuarios
  if(isset($_POST['submitR'])){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $clave= $_POST['clave'];

    $sqlR = "INSERT INTO usuario (id_u, nombre, apellido, edad, correo, usuario, clave) VALUES ( NULL, '$nombre', '$apellido', '$edad', '$correo', '$usuario', '$clave');";
    $resultR = $conexion->exec($sqlR);
    print($resultR." Filas afectadas");
    header("location:../imagen/vistas/login.php");
  }

  // iniciar sesion
  if (isset($_POST['submitLOG'])){
    if(empty($_POST['usuario']) || empty($_POST['clave'])){
      header("location:../imagen/vistas/login.php?Vacio= completa los campos");
    }
    else{
        $sqlLog = "SELECT * FROM usuario WHERE usuario='".$_POST['usuario']."' and clave='".$_POST['clave']."';";
        $resultLog = $conexion->query($sqlLog);
        $sql1 = "SELECT * FROM usuario WHERE usuario='".$_POST['usuario']."' and clave='".$_POST['clave']."';";
        $resul1 = $conexion->query($sql1);

        if ($resultLog->fetch(PDO::FETCH_ASSOC)){
          $_SESSION['user']=$_POST['usuario'];
          foreach($resul1 as $fila){
          $_SESSION['idu'] = $fila['id_u'];

          }
          // con session probar con foreach o while guardar el id_u
          header("location:../imagen/vistas/index2.php");
        }
        else{
          header("location:../imagen/vistas/login.php?Incorrecto= Ingresa el usuario y clave correcta");
        }
    }
  }


 ?>
