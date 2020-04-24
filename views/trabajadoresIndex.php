<?php require_once '../includes/head.php' ?>
<?php require_once '../includes/sidebar.php' ?>
<?php require_once '../controllers/select.php' ?>


<div class="container">
    <div class="row justify-content-center">
        <h1>Trabajadores</h1>
    </div>
    <?php if (isset($_SESSION['aceptado'])) : ?>
    <div class="toast alertas" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
        <div class="toast-body" style="background: #00a3d1; color: white;">
            <?= $_SESSION['aceptado']; ?>
        </div>
    </div>
    <?php elseif (isset($_SESSION['error'])) : ?>
    <div class="toast alertas" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
        <div class="toast-body bg-danger" style=" color: white;">
            <?= $_SESSION['error']; ?>
        </div>
    </div>
    <?php elseif (isset($_SESSION['alerta'])) : ?>
    <div class="toast alertas" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
        <div class="toast-body bg-warning">
            <?= $_SESSION['alerta']; ?>
        </div>
    </div>
    <?php endif; ?>
    <div class="row justify-content-end mb-2">
        <!--Se incluye el formulario-->
        <?php require_once './trabajadoresForm.php' ?>
    </div>
    <div class="row">
        <!--Tabla que mostrara los trabajadores-->
        <table class="table table-hover">
            <thead class="table-thead">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Direccion</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Salario</th>
                    <th>Rol</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $trabajadores = select_Trabajadores($conn);
                while ($trabajador = mysqli_fetch_assoc($trabajadores)) :
            ?>
                <tr>
                    <td><?= $trabajador['id']; ?></td>
                    <td><?= $trabajador['nombre']; ?></td>
                    <td><?= $trabajador['apellidos']; ?></td>
                    <td><?= $trabajador['direccion']; ?></td>
                    <td><?= $trabajador['telefono']; ?></td>
                    <td><?= $trabajador['correo']; ?></td>
                    <td><?= $trabajador['salario']; ?></td>
                    <td><?= strtoupper($trabajador['rol']); ?></td>
                    <td>
                        <div class="btn-group btn-group-sm"" role="group" aria-label="Basic example">
                            <?php require './trabajadoresEdit.php' ?>
                            <a href="../controllers/deleteTrabajador.php?id=<?= $trabajador['id']; ?>" class="btn btn-danger"><span class="fas fa-user-minus"></span></a>
                        </div>
                    </td>
                </tr>

            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
<?= deleteAlert(); ?>

<?php require_once '../includes/footer.php' ?>