<?php require_once '../includes/head.php' ?>
<?php require_once '../includes/sidebar.php' ?>
<?php require_once '../controllers/select.php' ?>
<div class="container">
    <div class="row justify-content-center">
        <h1>Proyectos</h1>
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
    </div>
    <div class="row">
        <!--Tabla que mostrara los trabajadores-->
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-thead">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Fecha de Inicio</th>
                        <th scope="col">Fecha Final</th>
                        <th scope="col">Costo</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Estatus</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $proyectos = select_Proyectos($conn);
                    while ($proyecto = mysqli_fetch_assoc($proyectos)) :
                ?>
                    <tr>
                        <th scope="row"><a href="./proyectosShow.php?id=<?= $proyecto['id']; ?>" class="btn btn-outline-dark btn-sm"><?= $proyecto['id']; ?></a></th>
                        <td><?= $proyecto['nombre']; ?></td>
                        <td><?= date("d-m-Y", strtotime($proyecto['fecha_inicio'])); ?></td>
                        <td><?= date("d-m-Y", strtotime($proyecto['fecha_final'])); ?></td>
                        <td><?= $proyecto['coste']; ?></td>
                        <td><?= $proyecto['cliente']; ?></td>
                        <td class="text-primary"><?= $proyecto['estatus']; ?></td>
                        <td class="">
                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <?php require './proyectosEdit.php' ?>
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