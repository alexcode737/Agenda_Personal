<?php

 include('./db.php');

if(isset($_POST['username'])){
    $username = $_POST['username'];
    $_SESSION['sesion_usuario'] = $username;
    $data = array();
    $data['mensaje'] = true;
    echo json_encode($data);
}

if(isset($_POST['sesion'])){
    session_destroy();
    $data = array();
    $data['mensaje'] = true;
    echo json_encode($data);
}
