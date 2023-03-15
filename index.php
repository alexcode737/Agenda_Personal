<?php  include("db.php") ?>

<?php include("archivos/header.php") ?>

<div class="container p-4">

    <div class="row">

        <div class="col-md-4">
            <?php if (isset($_SESSION['mensaje'])) { ?>
                <div class="alert alert-<?= $_SESSION['tipo_de_mensaje']  ?> alert-dismissible fade show" role="alert">
                     <?= $_SESSION['mensaje'] ?>
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset(); }  ?>

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
                    <input type="submit" class="btn btn-success btn-block mt-3" name="guardar" value="Guardar tarea">
                </form>
            </div>

        </div>

        <div class="col md-8">
                <table class="table table-bordered">
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
                            $query = "SELECT * FROM tarea";
                            $result_tareas = mysqli_query($conn, $query);

                            while($row = mysqli_fetch_array($result_tareas)) { ?>
                            <tr>
                                <td><?php echo $row['titulo']?></td>
                                <td><?php echo $row['descripcion']?></td>
                                <td><?php echo $row['fecha_creacion']?></td>
                                <td>
                                    <a href="eliminar_tarea.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i> </a>
                                </td>                
                                
                            </tr>

                        <?php } ?>
                        
                    </tbody>
                </table>
        </div>

    </div>

</div>

<?php include("archivos/footer.php")  ?>