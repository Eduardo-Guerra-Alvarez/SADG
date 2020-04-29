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
    <?php elseif (isset($_SESSION['actualizado'])) : ?>
    <div class="toast alertas" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
        <div class="toast-body bg-warning">
            <?= $_SESSION['actualizado']; ?>
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
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Fecha de Inicio</th>
                    <th scope="col">Fecha Final</th>
                    <th scope="col">Costo</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $obras = select_Trabajadores($conn);
                while ($obra = mysqli_fetch_assoc($obras)) :
            ?>
                <tr>
                    <th scope="row"><?= $obra['id']; ?></th>
                    <td><?= $obra['nombre']; ?></td>
                    <td><?= $obra['fecha_inicio']; ?></td>
                    <td><?= $obra['fecha_final']; ?></td>
                    <td><?= $obra['coste']; ?></td>
                    <td>
                        <div class="btn-group btn-group-sm"" role="group" aria-label="Basic example">
                            <?php require './obrasEdit.php' ?>
                            <a href="../controllers/deleteObra.php?id=<?= $obra['id']; ?>" class="btn btn-danger"><span class="fas fa-user-minus"></span></a>
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