<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <?php include '../partials/header.php'; ?>
    <title>Registro</title>
  </head>
  <body>
    <div class="container">
    <?php include '../partials/navegacion.php'; ?>
    <div class="container p-4">
      <div class="row">
        <div class="col-md-4 offset-md-4">
          <div class="card bg-dark">
            <div class="card-title bg-danger text-white mt-3">
                <h4 class="text-center py-2">Ingrese sus datos</h4>
            </div>
            <div class="card-body">
              <form class="" action="../peticiones.php" method="post">
                <div class="form-group">
                  <input type="text" name="nombre" placeholder="Nombre" class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" name="apellido" placeholder="Apellido" class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" name="edad" placeholder="Edad" class="form-control">
                </div>
                <div class="form-group">
                  <input type="email" name="correo" placeholder="Correo" class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" name="usuario" class="form-control" placeholder="Usuario">
                </div>
                <div class="form-group">
                  <input type="password" name="clave" placeholder="Contraseña" class="form-control">
                </div>
                <div class="form-group">
                <button type="submit" name="submitR" class="btn btn-success btn-block">Registrarse</button>
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
