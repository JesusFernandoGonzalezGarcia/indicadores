<?php
include('connection.php');
$search=$_POST['search'];

if (!empty($search)) {
    $sql="SELECT * FROM tarea WHERE nombre Like '$search%' ";
    $st_busqueda = mysqli_query($conexion,$sql);

    if (!$st_busqueda) {
        die('Error de conexion'.mysqli_error($conexion));
    }

    $json =array();
    while ($row=mysqli_fetch_array($st_busqueda)) {
        $json[]=array(
            'id_tarea'=>$row['id_tarea'],
            'nombre'=> $row['nombre'],
            'descripcion'=>$row['descripcion'],

        );
    }
    $jsonString =json_encode($json);
    echo $jsonString;
}

?>



hola