<?php
    include('connection.php');
    
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $sql= "DELETE FROM tarea WHERE id_tarea=$id";
        $resultado = mysqli_query($conexion,$sql);
        if (!$resultado) {
            die('Error al eliminar');
        }
        echo "si";
    }   

?>