<?php

include("db.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM tarea WHERE id = $id";
    $resultado = mysqli_query($conn, $query);
    if (!$resultado) {
        dei("La consulta ha fallado");
    }

    $_SESSION['mensaje'] = 'Tarea eliminada de forma satisfactoria';
    $_SESSION['tipo_de_mensaje'] = 'danger'; 
    header("Location: index.php");
}

?>