<?php

include("db.php");

if($_POST['username'] != '' && $_POST['password'] != ''){
   $username = $_POST['username'];
   $password = $_POST['password'];

   $consulta = "SELECT id FROM users WHERE username = '$username' AND password = '$password'";
   $resultado = mysqli_query($conn, $consulta);
   if (mysqli_num_rows($resultado) > 0) {
       // header("Location: index1.php");
        $data = array();
        $data['success'] = true;
        $data['message'] = 'Bien';
        echo json_encode($data);
        exit();
   }else {
      $data = array();
      $data['success'] = false;
      $data['message'] = 'Usuario o contraseña erroneos';
      echo json_encode($data);
      exit();
   }
} else {
   $data = array();
   $data['success'] = false;
   $data['message'] = 'Todos los campos deben ser rellenados';
   echo json_encode($data);
   exit();
}