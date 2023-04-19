
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/index.css">
    <title>Agenda Personal</title>
     <!-- Diseños de booststrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" 
     rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" 
     crossorigin="anonymous">
     <!-- FONT AWESOME -->
     <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script> 
        <!-- icons bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<body>

<nav class="navbar navbar-dark bg-primary">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>BIENVENIDO <?php echo $_SESSION['sesion_usuario']; ?></h1>
            </div>
            <div class="col-md-4">
                <button id="btnCS" class="btn btn-danger">Cerrar sesión</button>
            </div>
        </div>
    </div>
</nav>