<?php require_once '../controllers/conexion.php' ?>
<?php require_once '../includes/helpers.php' ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <!--Etiqueta para que acepte tilde y ñ-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Enlaces para usar Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!--Enlaces para usar FontAwesome son iconos-->
    <script src="https://kit.fontawesome.com/8eaed8659a.js" crossorigin="anonymous"></script>
    <!--Enlaces para usar style.css-->
    <link rel="stylesheet" href="../assets/css/styles.css">
    <!--Nombre de etiqueta-->
    <title>Diseño Grafico</title>
</head>
<body id="index">
    
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
                        <button class="btn btn-aqua ">Iniciar Sesión</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="particles-js"></div>
    <?php deleteAlert(); ?>
    <script src="../assets/js/alert.js"></script>
    -<script src="../assets/js/particles.js"></script>
    <script src="../assets/js/app.js"></script>
</body>
</html>
<?php require_once '../includes/head.php' ?>
