<?php
    include('connection.php');
    $sql= "SELECT * FROM tarea";
    $result=mysqli_query($conexion,$sql);

    if (!$result) {
        die('Error' . mysqli_error($conexion));
    }


    $json=array();
    while ($row = mysqli_fetch_array($result)) {
        $json[]=array(
            'id_tarea'=> $row['id_tarea'],
            'nombre' => $row['nombre'],
            'descripcion' => $row['descripcion']
            
        );
    }
    $jsonString = json_encode($json);
    echo $jsonString;

?>