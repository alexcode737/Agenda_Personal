<?php

   include("db.php");

   if(isset($_POST['guardar'])) {
      if($_POST['titulo'] != '' || $_POST['descripcion'] != ''){
         $titulo = $_POST['titulo'];
         $descripcion = $_POST['descripcion'];
   
         $consulta = "INSERT INTO tarea(titulo, descripcion) VALUES ('$titulo','$descripcion')";
         $resultado = mysqli_query($conn, $consulta);
         if (!$resultado) {
            die("la consulta ha fallado");
         }

         $_SESSION['mensaje'] = 'Tarea guardada satisfactoriamente';
         $_SESSION['tipo_de_mensaje'] = 'success';
      } else {
         $_SESSION['mensaje'] = 'Debe completar todos los campos';
         $_SESSION['tipo_de_mensaje'] = 'danger';
      }



      header("Location: index.php");
   }

?>