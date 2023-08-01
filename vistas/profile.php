<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <?php
    session_start();
    if(isset($_SESSION['user'])){
      echo 'BIENVENIDO: '.$_SESSION['user'].' - ';
      echo '<a href="./logout.php?desconectar">Desconectar</a>';
    }
    else{
      header("location:./index.php");
    }
    ?>
    <title>Profile</title>
  </head>
  <body>
    <div class="container">
    <?php
    include '../partials/header.php';
    require_once '../peticiones.php';
    include '../partials/navegacion2.php';
    
    $sqlU = "SELECT * FROM usuario WHERE id_u = '".$_SESSION['idu']."';";
    $resultU = $conexion->query($sqlU);
    ?>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>
                <th>Correo</th>
                <th>Usuario</th>
                <th>Contraseña</th>
                <th>Modificar Datos</th>
                <th>Eliminar Cuenta</th>
            </tr>
        </thead>
        <tbody>
                    <tr>
                      <?php foreach ( $resultU as $rows ){?>
                        <td><?=$rows['id_u']?></td>
                        <td><?=$rows['nombre']?></td>
                        <td><?=$rows['apellido']?></td>
                        <td><?=$rows['edad']?></td>
                        <td><?=$rows['correo']?></td>
                        <td><?=$rows['usuario']?></td>
                        <td><?=$rows['clave']?></td>
                        <td>
                          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                              <input type="hidden" name="datos" value="<?php echo($rows['id_u'])?>"></input>
                              <input class="btn btn-warning btn-block" type ="submit" name="enviar" value="Modificar"></input>
                          </form>
                        </td>
                        <td>
                          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                              <input class="btn btn-danger btn-block" type ="submit" name="eliminar" value="Eliminar"></input>
                          </form>
                        </td>
                    </tr>
                <?php } ?>
        </tbody>
</table>

    <?php
        if(isset($_POST['datos'])){
          $test = $_POST['datos'];
          $sqlM = "SELECT * FROM usuario WHERE id_u = '".$test."';";
          $resultM = $conexion->query($sqlM);
          }
    ?>
    <?php
              error_reporting (E_ALL ^ E_NOTICE);
                if (is_array($resultM) || is_object($resultM)){
                      foreach ( $resultM as $row ){?>
                      <div class="container">
                      <?php
                      $rnombre = $row['nombre'];
                      $rapellido = $row['apellido'];
                      $redad = $row['edad'];
                      $rcorreo = $row['correo'];
                      $rusuario = $row['usuario'];
                      $rclave = $row['clave'];
                      ?>

                      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"method="POST">
                          <label>Nombre:</label>
                          <input name="nombre" type="text" value=<?=$rnombre?> class="form-control"><br>
                          <label>Apellido:</label>
                          <input name="apellido" type="text" value=<?=$rapellido?> class="form-control"><br>
                          <label>Edad:</label>
                          <input name="edad" type="text" value=<?=$redad?> class="form-control"><br>
                          <label>Correo:</label>
                          <input name="correo" type="text" value=<?=$rcorreo?> class="form-control"><br>
                          <label>Usuario:</label>
                          <input name="usuario" type="text" value=<?=$rusuario?> class="form-control"><br>
                          <label>Contraseña:</label>
                          <input name="clave" type="text" value=<?=$rclave?> class="form-control"><br>
                          <input type="submit" name="submitU" value="Modificar" class="btn btn-primary">
                      </form>
                      </div>
              <?php } }?>
              <?php
              if(isset($_POST["submitU"])){
          try{
            //  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); // <== add this line
            //  $con->setAttribute( PDO::ATTR_EMULATE_PREPARES, false )

          $sqlMod = "UPDATE usuario SET nombre='".$_POST['nombre']."', apellido='".$_POST['apellido']."', edad='".$_POST['edad']."', correo='".$_POST['correo']."', usuario='".$_POST['usuario']."', clave='".$_POST['clave']."' WHERE id_u = '".$_SESSION['idu']."'";
          if ($conexion->query($sqlMod)) {
            header("Refresh: 1; url=./profile.php");
            echo '<script>alert("Los cambios se efectuaron correctamente.");</script>';
              }
              else{
              echo "<script type= 'text/javascript'>alert('La informacion no se guardo.');</script>";
              }
          }catch(PDOException $e)
          {
              echo $e->getMessage();
          }
          }
              ?>


              <?php
                if(isset($_POST['eliminar'])){
                  $sqlBorrar = "DELETE FROM usuario WHERE id_u ='".$_SESSION['idu']."';";
                  $resultBorrar = $conexion->query($sqlBorrar);
                  session_start();
                  header("Refresh: 1; url=./index.php");

                  echo '<script>alert("Usted ha eliminado su cuenta, volvera al inicio..");</script>';
                }
              ?>

    </div>
  </body>
</html>
