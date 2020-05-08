<?php require_once '../includes/head.php' ?>
<?php require_once '../includes/sidebar.php' ?>
<?php require_once '../controllers/select.php' ?>
<div class="container">
    <div class="row justify-content-center">
        <h1>Proyecto</h1>
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
    <div class="row">
        <div class="col">
            <!--Tabla que mostrara los trabajadores-->
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-thead">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Fecha de Inicio</th>
                            <th scope="col">Fecha Final</th>
                            <th scope="col">Costo</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Estatus</th>
                            <th scope="col">Trabajador</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $proyectos = select_ProyectosShow($conn, $_GET['id']);
                        $proyecto = mysqli_fetch_assoc($proyectos);
                    ?>
                        <tr>
                            <th scope="row"><?= $proyecto['id']; ?></th>
                            <td><?= $proyecto['nombre']; ?></td>
                            <td><?= $proyecto['fecha_inicio']; ?></td>
                            <td><?= $proyecto['fecha_final']; ?></td>
                            <td><?= $proyecto['coste']; ?></td>
                            <td><?= $proyecto['cliente']; ?></td>
                            <td class="text-primary"><?= $proyecto['estatus']; ?></td>
                            <td>
                            <div class="box overflow-auto">
                                <table class="table table-hover table-borderless">
                                    <tbody>
                                    <?php 
                                        $trabajadores_proy = select_ProyTrab($conn, $_GET['id']);
                                        while($trabajador = mysqli_fetch_assoc($trabajadores_proy)) :
                                    ?>
                                        <tr>
                                            <td><?= $trabajador['trabajador'] ?></td>
                                            <td><a href="../controllers/deleteTrabProy.php?idP=<?= $_GET['id'].'&idT='.$trabajador['id']?>" class="btn btn-danger btn-sm"><span class="fas fa-minus"></span></a></td>
                                        </tr>
                                    <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Agregar Diseñador</h4>
                </div>
                <div class="card-body">
                    <form action="../controllers/addTrabProy.php" method="POST">
                        <div class="form-group">
                            <select class="form-control" name="trabajadores[]" multiple>
                                <?php 
                                    $trabajadores = select_Trabajadores($conn);
                                    while ($trabajador = mysqli_fetch_assoc($trabajadores)) :
                                        if ($trabajador['rol'] == 'diseñador') :
                                ?>
                                <option value="<?= $trabajador['id'] ?>"><?= $trabajador['nombre'].' '.$trabajador['apellidos'] ?></option>
                                        <?php endif; ?>
                                <?php endwhile; ?>
                            </select>
                            <input type="hidden" name="id_proyecto" value="<?= $_GET['id'] ?>">
                        </div>
                        <button class="btn btn-success">Seleccionar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Enviar propuestas</h5>
                </div>
                <div class="card-body">
                    <form action="">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Propuesta</label>
                        <input type="file" class="" id="exampleFormControlFile1">
                    </div>
                    <button class="btn btn-dark">Subir</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
        <div class="card">
                <div class="card-header">
                <h5 class="card-title">Propuestas</h5>
                </div>
                <div class="card-body">
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?= deleteAlert(); ?>

<?php require_once '../includes/footer.php' ?>