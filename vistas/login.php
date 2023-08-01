<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <?php include '../partials/header.php'; ?>
    <title>Iniciar sesion</title>

  </head>
  <body>
    <div class="container">
      <?php include '../partials/navegacion.php'; ?>
      <div class="container p-4">


      <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card bg-dark mt-5">
                <div class="card-title bg-danger text-white mt-3">
                    <h4 class="text-center py-2">Iniciar sesion</h4>
                </div>
                <?php
                    if(@$_GET['Vacio']==true){
                ?>
                  <div class="alert-light text-danger"> <?php echo $_GET['Vacio']?></div>
                <?php
                    }
                ?>


                <?php
                    if(@$_GET['Incorrecto']==true){
                ?>
                  <div class="alert-light text-danger"> <?php echo $_GET['Incorrecto']?></div>
                <?php
                    }
                ?>

                <div class="card-body m-auto">
                    <form action="../peticiones.php" method="post">
                      <p>Usuario:</p>
                      <input type="text" name="usuario" placeholder="Usuario"  autofocus>
                      <p>Contraseña:</p>
              				<input type="password" name="clave" placeholder="contraseña" >
                    </br>
                      <input  class="btn btn-success mt-3"type="submit" value="Ingresar" name="submitLOG">
                      <!-- <a class="btn btn-primary mt-3" href=" ../index.php">Volver</a> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    </div>
  </body>
</html>
