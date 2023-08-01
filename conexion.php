<?php
    $hostname = "localhost";
    $database = "imagen_db";
    $username = "root";
    $password = '';

        try{
            $conexion = new PDO ('mysql:host=' . $hostname . ';dbname=' . $database, $username, $password);
            //print "conexion a DB exitosa !!</br>";
        }
        catch(PDOException $e){
            print "ERROR: ".$e->getMessage();
            die();
        }
    ?>
