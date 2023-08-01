<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <?php include '../partials/header.php';
    session_start();
    if(isset($_SESSION['user'])){
      echo 'BIENVENIDO: '.$_SESSION['user'].' - ';
      echo '<a href="./logout.php?desconectar">Desconectar</a>';
    }
    else{
      header("location:./index.php");
    }

    ?>
    <title>Subir posteo</title>
  </head>
  <body>
    <div class="container">
    <?php include '../partials/navegacion2.php'; ?>
    <div class="container p-4">
      <div class="row">
        <div class="col-md-4 offset-md-4">
          <div class="card">
            <div class="card-body">
              <form class="" action="../peticiones.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <input type="text" name="titulo" placeholder="Titulo" class="form-control">
                </div>

                <div class="input-group mb-3">
                  <div class="custom-file">
                    <input type="file" name="imagen" class="custom-file-input" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03">
                    <label class="custom-file-label" for="inputGroupFile03">Elegir archivo</label>
                  </div>
                </div>

                <div class="form-group">
                  <input type="text" name="descripcion" class="form-control" placeholder="Descripcion">
                </div>
                <div class="form-group">
                <button type="submit" name="submitI" class="btn btn-success btn-block">Postear</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
    <?php include '../partials/footer.php'; ?>

  </div>
  </body>
</html>
