<?php

   include("db.php");

   if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM tarea WHERE id = $id";
    $resultado = mysqli_query($conn,$query);

    if(mysqli_num_rows($resultado) == 1){
        $row = mysqli_fetch_array($resultado);
        $titulo = $row['titulo'];
        $descripcion = $row['descripcion'];
    }
   }

   if(isset($_POST['actualizar'])){
    $id = $_GET['id'];
    $tituloActualizado = $_POST['titulo'];
    $descripcionActualizado = $_POST['descripcion'];
    
    $query2 = "UPDATE tarea set titulo = '$tituloActualizado', descripcion = '$descripcionActualizado ' WHERE id = $id";
    mysqli_query($conn,$query2);

    $_SESSION['mensaje'] = 'Tarea actualizada correctamente';
    $_SESSION['tipo_de_mensaje'] = 'success';
    header('Location: index.php');

    }

?>
<?php include("archivos/header.php") ?>

<div class="container p-4">
   <div class="row">
        <div class="col-md-2">
            <a href="index.php" class="btn btn-outline-danger">Regresar</a>
        </div>
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="editar_tarea.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="titulo" value="<?php echo $titulo; ?>" class="form-control" placeholder="Actualizar titulo">
                    </div>
                    <div class="form-group">
                        <textarea name="descripcion" placeholder="Actualizar descripcion" rows="2" class="form-control mt-3"><?php echo $descripcion; ?></textarea>
                    </div>
                    <button class="btn btn-outline-success mt-3" name="actualizar">
                        Actualizar
                    </button>
                </form>
            </div>

        </div>
   </div>
</div>

<?php include("archivos/footer.php")  ?>