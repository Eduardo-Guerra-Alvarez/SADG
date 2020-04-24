<?php require_once '../includes/head.php' ?>
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="card" style="width: 50%;">
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
</div>
<?php deleteAlert(); ?>

<!--Incluye fin de html-->
<?php require_once '../includes/footer.php' ?>