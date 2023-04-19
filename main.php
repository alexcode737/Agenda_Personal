<?php  include("db.php") ?>

<?php include("./header-footer/header.php") ?>

<?php 

    if(!isset($_SESSION['sesion_usuario'])){
        header('Location: index.html');
    }
?>

<div class="container p-4">

    <div class="row">

        <div class="col-md-4">
            <?php if (isset($_SESSION['mensaje'])) { ?>
                <div class="alert alert-<?= $_SESSION['tipo_de_mensaje']  ?> alert-dismissible fade show" role="alert">
                     <?= $_SESSION['mensaje'] ?>
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php unset($_SESSION['mensaje']); }  ?>

            <div class="card card-body">
                <form action="guardar_tarea.php" method="POST">
                    <div class="form-group ">
                        <input type="text" name="titulo" class="form-control"
                        placeholder="Titulo de tarea" autofocus>
                    </div>
                    <div class="form-group mt-3">
                        <textarea name="descripcion" rows="3" class="form-control"
                        placeholder="Escriba su descripcion"></textarea>
                    </div>
                    <input type="submit" class="btn btn-outline-success btn-block mt-3" name="guardar" value="Guardar tarea">
                </form>
            </div>

        </div>

        <div class="col md-8">
                <table class="table table-bordered bg-white">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Descripcion</th>
                            <th>Fecha de creacion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $username = $_SESSION['sesion_usuario'];
                            $queryIdUser = mysqli_query($conn,"SELECT id FROM users WHERE username = '$username'");

                            $result_userId = mysqli_fetch_assoc($queryIdUser)['id'];
                            $query = "SELECT * FROM tarea WHERE id_user = '$result_userId'";
                            $result_tareas = mysqli_query($conn, $query);
                            if(!$result_tareas) {
                                echo "Error al ejecutar la consulta: " . mysqli_error($conn);
                            }

                            while($row = mysqli_fetch_array($result_tareas)) { ?>
                            <tr>
                                <td><?php echo $row['titulo']?></td>
                                <td><?php echo $row['descripcion']?></td>
                                <td><?php echo $row['fecha_creacion']?></td>
                                <td>
                                    <a href="editar_tarea.php?id=<?php echo $row['id']?>" class="btn btn-primary">
                                        <i class="fas fa-marker"></i>
                                    </a>
                                    <a href="eliminar_tarea.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>                
                                
                            </tr>

                        <?php } ?>
                        
                    </tbody>
                </table>
        </div>

    </div>

</div>

<?php include("./header-footer/footer.php")  ?>