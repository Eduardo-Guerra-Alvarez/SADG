<?php require_once '../includes/head.php' ?>
<?php require_once '../includes/sidebar.php' ?>
<?php require_once '../controllers/select.php' ?>
<div class="container">
    <div class="row justify-content-center">
        <h1>Clientes</h1>
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
        <?php require_once './clientesForm.php' ?>
    </div>
    <div class="row">
        <!--Tabla que mostrara los trabajadores-->
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-thead">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $clientes = select_Clientes($conn);
                    while ($cliente = mysqli_fetch_assoc($clientes)) :
                ?>
                    <tr>
                        <th scope="row"><?= $cliente['id']; ?></th>
                        <td><?= $cliente['nombre']; ?></td>
                        <td><?= $cliente['apellidos']; ?></td>
                        <td><?= $cliente['direccion']; ?></td>
                        <td><?= $cliente['telefono']; ?></td>
                        <td><?= $cliente['correo']; ?></td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <?php require './clientesEdit.php' ?>
                                <?php require './proyectosForm.php' ?>
                            </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= deleteAlert(); ?>
<?php require_once '../includes/footer.php' ?>