<?php


   include("db.php");
   include("./session_usuario.php");

   if(isset($_POST['guardar'])) {
      if($_POST['titulo'] != '' || $_POST['descripcion'] != ''){
         $titulo = $_POST['titulo'];
         $descripcion = $_POST['descripcion'];
         $username = $_SESSION['sesion_usuario'];

         $queryIdUser = mysqli_query($conn,"SELECT id FROM users WHERE username = '$username'");
         $result_userId = mysqli_fetch_assoc($queryIdUser)['id'];
         $consulta = "INSERT INTO tarea(titulo, descripcion,id_user) VALUES ('$titulo','$descripcion','$result_userId')";
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



      header("Location: main.php");
   }

?>