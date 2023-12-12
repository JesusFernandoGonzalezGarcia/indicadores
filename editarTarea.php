<?php
    include('connection.php');
    $id=$_POST['id'];
    $sql="SELECT * FROM tarea WHERE id_tarea=$id";
    $resultado= mysqli_query($conexion,$sql);
    if (!$resultado) {
        die('Error');
    }

    $json=array();
    while ($row = mysqli_fetch_array($resultado)) {
        $json[]=array(
            
            'nombre'=>$row['nombre'],
            'descripcion'=>$row['descripcion'],
            'id_tarea'=>$row['id_tarea']
        );
    }
    $jsonString=json_encode($json[0]);
    echo $jsonString;


?>