<?php
include('connection.php');

$id = $_POST['id']; 
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];

$sql="UPDATE tarea SET nombre='$nombre', descripcion='$descripcion' WHERE id_tarea='$id'";
$resultado=mysqli_query($conexion,$sql);

if (!$resultado) {
    die('Error');
}
echo 'Simon';



?>