<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <?php
    include '../partials/header.php';
    ?>

    <title>Free City</title>
  </head>
  <body>
<div class="container">
  <?php
  include '../partials/navegacion.php';
  require_once '../peticiones.php';
  ?>
  <div class="mt-2 container">
    <div class="col-md-10 mx-auto">
      <h2 class=" text-white text-center">Bienvenido a la Red social de barrios</h2>

      <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../uploaded/ifts.jpg" class="d-block w-100" alt="ifts">
      <div class="carousel-caption d-none d-md-block">
        <h5>Juntos por el Instituto</h5>
        <p>Organizacion de firmas para el NO cierre del establecimiento.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../uploaded/ifts16.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Organizacion vecinal</h5>
        <p>Juntos con el barrio por el reclamo de cierre.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../uploaded/evento.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Acerquese a compartir este evento</h5>
        <p>Muchos niños festejando su dia.</p>
      </div>
    </div>

    <div class="carousel-item">
      <img src="../uploaded/ARCHI_512289.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Reparaciones en el barrio.</h5>
        <p>Se presentan arreglos cloacales en las calles de MonteCastro.</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

    <h2>Proposito</h2>
    <p>Brindar informacion, seguridad y comunicacion a todos los vecinos que se encuentren registrados.</p>
    <h2>Visión</h2>
    <p>Ser el principal medio de comunicacion e informacion para barrios con la mayoria de usuarios en capital federal.</p>
    <h2>Quienes somos.</h2>
    <p>Somos un grupo de estudiantes el cual tiene como objetivo unificar toda la informacion que recorre cada barrio en un solo sitio.</p>
    </div>
  </div>
<?php
  include '../partials/footer.php';
?>
  </body>
</html>
