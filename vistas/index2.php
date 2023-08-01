<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <?php
    include '../partials/header.php';
    session_start();
    error_reporting (E_ALL ^ E_NOTICE);
    if(isset($_SESSION['user'])){
      echo 'BIENVENIDO: '.$_SESSION['user'].' - ';
      echo '<a href="./logout.php?desconectar">Desconectar</a>';
    }
    else{
      header("location:./index.php");
    }
    ?>
    <title>Posteos</title>
  </head>
  <body>
<div class="container">
  <?php
  include '../partials/navegacion2.php';
  require_once '../conexion.php';
  require_once '../peticiones.php';
  ?>
  <div class="mt-2 container">
    <h1>Todos los posteos</h1>
                      <div class="container p-4">
                      <div class="row">
                        <div class="card-columns">
                      <?php foreach ( $result as $rows ){?>
                        <div class="card text-white bg-primary">
                          <img src="/imagen/uploaded/<?=$rows['imagen_url']?>" class="card-img-top" alt="">
                          <div class="card-body">
                            <h5 class="card-title"><?=$rows['titulo']?></h5>
                            <p class="card-text"><?=$rows['descripcion']?></p>
                            <span><?=$rows['tiempo']?></span>

                            <?php
                            $testUser = $rows['fk_usuario'];

                              $sqlNombre = "SELECT usuario.nombre FROM posteo JOIN usuario WHERE '".$testUser."' = id_u LIMIT 1;";
                              $resultNombre = $conexion->query($sqlNombre);
                            ?>

                            <mark>
                              <?php foreach ($resultNombre as $f) {?>
                                  <?php  echo "By - ".$f['nombre']." "; ?>
                                  <?php  } ?>
                            </mark>


                          </div>
                          <div class="card-footer post">
                            <?php
                              $sqlLike= "SELECT * FROM `like` WHERE id_p = '".$rows['id_p']."' AND id_u = '".$_SESSION['idu']."';";
                              $resultLike = $conexion->query($sqlLike);
                              if($resultLike->fetchColumn()>0){
                                ?>
                                <button value="<?php echo $rows['id_p'];?>" class="unlike">UnLike</button>
                                <?php
                              }
                              else{
                                ?>
                                <button value="<?php echo $rows['id_p'];?>" class="like">Like</button>
                                <?php
                              }
                                ?>
                                <span id="show_like<?php echo $rows['id_p'];?>">
                                    <?php
                                      $sql3= "SELECT COUNT(*) FROM `like` WHERE id_p = '".$rows['id_p']."';";
                                      $result3 = $conexion->query($sql3);
                                      echo $result3->fetchColumn();
                                    ?>
                                </span>
                                  <div>
                                    <form action="./foto.php" method="POST">
                                        <input type="hidden" name="foto" value="<?php echo($rows['id_p'])?>"></input>
                                        <input class="btn btn-success" type ="submit" name="enviar" value="Ver"></input>
                                    </form>
                                  </div>
                              </div>
                          </div>
                <?php } ?>
                </div>
              </div>
            </div>
  </div>
</div>


<script src = "jquery-3.1.1.js"></script>
<script type = "text/javascript">
 $(document).ready(function(){

   $(document).on('click', '.like', function(){
     var id=$(this).val();
     var $this = $(this);
     $this.toggleClass('like');
     if($this.hasClass('like')){
       $this.text('Like');
     } else {
       $this.text('Unlike');
       $this.addClass("unlike");
     }
       $.ajax({
         type: "POST",
         url: "like.php",
         data: {
           id: id,
           like: 1,
         },
         success: function(){
           showLike(id);
         }
       });
   });

   $(document).on('click', '.unlike', function(){
     var id=$(this).val();
     var $this = $(this);
     $this.toggleClass('unlike');
     if($this.hasClass('unlike')){
       $this.text('Unlike');
     } else {
       $this.text('Like');
       $this.addClass("like");
     }
       $.ajax({
         type: "POST",
         url: "like.php",
         data: {
           id: id,
           like: 1,
         },
         success: function(){
           showLike(id);
         }
       });
   });

 });

 function showLike(id){
   $.ajax({
     url: 'show_like.php',
     type: 'POST',
     async: false,
     data:{
       id: id,
       showlike: 1
     },
     success: function(response){
       $('#show_like'+id).html(response);

     }
   });
 }

</script>

</body>
</html>
