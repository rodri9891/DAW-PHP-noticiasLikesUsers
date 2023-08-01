<?php
    session_start();

    if(isset($_GET['desconectar'])){
        session_destroy();
        header("location:./index.php");
    }
?>
