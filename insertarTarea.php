<?php
    include('connection.php');

    if(empty($_POST['nombre'])){
        echo 'Ingresa un nombre';
    }elseif(empty($_POST['descripcion'])){
        echo 'Ingresa una descripcion';
    }else{
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $sql = "INSERT INTO tarea (nombre,descripcion) VALUES ('$nombre','$descripcion')";
        $resultado= mysqli_query($conexion,$sql);
        if (!$resultado) {
            die('Error');
        }
        echo 'si';
    }

    
?>