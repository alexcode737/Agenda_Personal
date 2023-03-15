<?php

   include("db.php");

   if(isset($_POST['guardar'])) {
      $titulo = $_POST['titulo'];
      $descripcion = $_POST['descripcion'];

      $consulta = "INSERT INTO tarea(titulo, descripcion) VALUES ('$titulo','$descripcion')";
      $resultado = mysqli_query($conn, $consulta);
      if (!$resultado) {
         die("la consulta ha fallado");
      }

      $_SESSION['mensaje'] = 'tarea guardada satisfactoriamente';
      $_SESSION['tipo_de_mensaje'] = 'success';

      header("Location: index.php");
   }

?>