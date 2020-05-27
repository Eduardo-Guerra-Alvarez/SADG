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
                            <th scope="col">Trabajadores</th>
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
                                                <?php if($_SESSION['user']['rol'] == 'gestor') : ?>
                                                <td><a href="../controllers/deleteTrabProy.php?idP=<?= $_GET['id'].'&idT='.$trabajador['id']?>" class="btn btn-danger btn-sm"><span class="fas fa-minus"></span></a></td>
                                                <?php endif; ?>
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
    <p>Descripción: <?= $proyecto['descripcion']?> </p>
    <hr>
    <div class="row">
        <?php if($_SESSION['user']['rol'] == 'gestor') : ?>
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
                                        $result = true;
                                        if ($trabajador['rol'] == 'diseñador') :
                                            $trabajadores_proy = select_ProyTrab($conn, $_GET['id']);
                                            while($trabajadorp = mysqli_fetch_assoc($trabajadores_proy)) :
                                                if ($trabajador['id'] == $trabajadorp['id']) {
                                                    $result = false;
                                                }
                                            endwhile;
                                            if ($result) :
                                ?>
                                                <option value="<?= $trabajador['id'] ?>"><?= $trabajador['nombre'].' '.$trabajador['apellidos'] ?></option>
                                <?php 
                                            endif;
                                        endif; 
                                    endwhile; 
                                ?>
                            </select>
                            <input type="hidden" name="id_proyecto" value="<?= $_GET['id'] ?>">
                        </div>
                        <button class="btn btn-success">Seleccionar</button>
                    </form>
                </div>
            </div>
        </div>
        <?php elseif($_SESSION['user']['rol'] == 'diseñador') : ?>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Enviar propuestas</h5>
                </div>
                <div class="card-body">
                    <form action="../controllers/propuesta.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="id_proyecto" value="<?= $_GET['id'] ?>">
                        <input type="hidden" name="id_trabajador" value="<?= $_SESSION['user']['id'] ?>">
                        <label for="propuesta">Propuesta</label>
                        <input type="file" name="propuesta">
                    </div>
                    <button class="btn btn-dark">Subir</button>
                    </form>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if($_SESSION['user']['rol'] != 'administrador' && $_SESSION['user']['rol'] != 'secretaria'): ?>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Propuestas</h5>
                </div>
                <div class="card-body">
                    <div class="overflow-auto" id="propuesta">
                        <table class="table table-hover table-sm">
                            <tbody>
                                <?php
                                $propuestas = select_Propuestas($conn, $_GET['id']);
                                while ($propuesta = mysqli_fetch_assoc($propuestas)) :
                                    if ($propuesta['trabajador'] != $trab) :
                                ?>
                                <thead class="thead-dark">
                                    <tr>
                                        <th><?= $propuesta['trabajador'] ?></th>
                                    </tr> 
                                </thead>
                                <?php endif; $trab = $propuesta['trabajador']; ?>
                                <tr>
                                    <td><a href="../archives/<?= $propuesta['propuesta'] ?>"><?= $propuesta['propuesta'] ?></a></td>
                                    <?php if($_SESSION['user']['rol'] == 'gestor') : ?>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-success"><span class="fas fa-check"></span></button>
                                            <button type="button" class="btn btn-danger"><span class="fas fa-times"></span></button>
                                        </div>
                                    </td>
                                    <?php endif; ?>
                                </tr>
                                <?php 
                                endwhile; 
                                ?>    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <?php if($_SESSION['user']['rol'] == 'gestor'): ?>
    <div class="row justify-content-center">
        <button class="btn btn-danger mt-5">Finalizar</button>
    </div>
    <?php endif; ?>
</div>
<?= deleteAlert(); ?>

<?php require_once '../includes/footer.php' ?>