<?php

include("../db.php");

$username = $_POST['username'];
$name = $_POST['name'];
$password = $_POST['password'];

$consulta = "SELECT username FROM users WHERE username = '$username'";
$buscarUserName = mysqli_query($conn,$consulta);
if(mysqli_num_rows($buscarUserName) > 0){
   $data = array();
   $data['type'] = 'error';
   $data['title'] = 'Error';
   $data['message'] = 'Nombre de usuario no disponible';
   echo json_encode($data);
} else {
   $registrarUsuario = "INSERT INTO users (nombres,username,password) VALUES ('$name','$username','$password')";
   $resultadoRegistrarUsuario = mysqli_query($conn, $registrarUsuario);
   if(!$resultadoRegistrarUsuario){
      $data = array();
      $data['success'] = false;
      $data['message'] = 'La consulta ha fallado: '. mysqli_error($conn);
      echo json_encode($data);
   } else {
      $data = array();
      $data['type'] = 'success';
      $data['title'] = 'Exito!!';
      $data['message'] = 'Usuario registrado correctamente';
      echo json_encode($data);
   }
}


