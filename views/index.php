<?php require_once '../controllers/conexion.php' ?>
<?php require_once '../includes/helpers.php' ?>
<!--Cabecera con todos los enlaces-->
<!DOCTYPE html>
<html lang="es">
<head>
    <!--Etiqueta para que acepte tilde y ñ-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Enlaces para usar style.css-->
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="icon" href="../assets/images/icon.ico">
    <!--Nombre de etiqueta-->
    <title>Diseño Grafico</title>
</head>
<body id=index>
    <!--Integrantes del equipo-->
    <div id="integrantes">
        <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            ?
        </a>
        <div class="collapse" id="collapseExample">
                <h2>Creadores: </h2>
                <p>Eduardo Guerra Alvarez</p>
                <p>Luis Armando Prado Nuñez</p>
                <p>José Luis Serna Serna</p>
                <p>Raúl de Jesús Simental Magaña</p>
            </div>
        </div>
    </div>
    <div id="content" >
    <img id="logo" src="../assets/images/logo.png" alt="Logo" width="100%">
        <div class="card">
            <div class="card-header text-center">
                <h3 class="card-title">Iniciar Sesión</h3>
            </div>
            <div class="card-body">
                <?php if (isset($_SESSION['error'])) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $_SESSION['error'] ?>
                </div>
                <?php endif; ?>
                <form action="../controllers/login.php" method="POST">
                    <div class="form-groupl">
                        <label for="">Correo</label>
                        <input type="email" class="form-control" name="correo" autofocus required>
                    </div>
                    <div class="form-groupl">
                        <label for="">Contraseña</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="row pt-3 justify-content-center">
                        <button class="btn btn-aqua">Iniciar Sesión</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="particles-js"></div>
    
    <?php deleteAlert(); ?>
    <script src="../assets/js/alert.js"></script>
    <script src="../assets/js/particles.js"></script>
    <script src="../assets/js/app.js"></script>
</body>
</html>
<?php require_once '../includes/head.php' ?>
