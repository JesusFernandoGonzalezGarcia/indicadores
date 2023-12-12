<?php
include_once "connection.php";

$accion = (isset($_GET['accion'])) ? $_GET['accion'] : "";

switch($accion){
    case 'insertar':

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

    break;
    case 'listar':
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
    

    break;
    case 'modificar':
        $id = $_POST['id']; 
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];

        $sql="UPDATE tarea SET nombre='$nombre', descripcion='$descripcion' WHERE id_tarea='$id'";
        $resultado=mysqli_query($conexion,$sql);

        if (!$resultado) {
            die('Error');
        }
        echo 'Simon';
        
    break;

    case 'eliminar':
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $sql= "DELETE FROM tarea WHERE id_tarea=$id";
            $resultado = mysqli_query($conexion,$sql);
            if (!$resultado) {
                die('Error al eliminar');
            }
            echo "si";
        }   
    break;
    
    case 'editar':
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
    break;
} 
?>