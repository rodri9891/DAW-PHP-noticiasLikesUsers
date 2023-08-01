<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <?php
      include '../partials/header.php';
      require_once '../peticiones.php';
    ?>
    <title>Foto</title>
  </head>
  <body>
    <?php


    if(isset($_POST['foto'])){
      $test2 = $_POST['foto'];
      $sqlFoto = "SELECT imagen_url FROM posteo WHERE id_p='".$test2."';";
      $resultFoto = $conexion->query($sqlFoto);
    }
    ?>

    <?php
              error_reporting (E_ALL ^ E_NOTICE);
                if (is_array($resultFoto) || is_object($resultFoto)){
                      foreach ( $resultFoto as $row ){?>
                        <div class="container p-4">
                          <div class="row">
                            <div class="col-md-8 offset-md-2">
                              <div class="card">
                                <img src="/imagen/uploaded/<?=$row['imagen_url']?>" class="card-img-top" alt="">
                              </div>
                              <div class="card-body">
                                <a href="./index2.php" class="btn btn-primary btn-block">Volver</a>
                              </div>
                            </div>
                          </div>
                        </div>
              <?php } }?>





  </body>
</html>
