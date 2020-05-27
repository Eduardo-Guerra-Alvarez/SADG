<?php require_once '../controllers/conexion.php' ?>
<!--Menu-->
<div id="mySidenav" class="sidenav">
    <div id="user">
        <span class="fas fa-user fa-6x"></span>
        <h4 class="pt-2"> <?= mb_strtoupper($_SESSION['user']['rol']) ?> </h4>
    </div>
    <hr>
    <div id="enlace">
    <?php if($_SESSION['user']['rol'] == 'administrador') : ?>
        <a href="./trabajadoresIndex.php">Trabajadores</a>
        <a href="./clientesIndex.php">Clientes</a>
        <a href="./proyectosIndex.php">Proyectos</a>
    <?php elseif($_SESSION['user']['rol'] == 'gestor' || $_SESSION['user']['rol'] == 'diseñador') : ?>
        <a href="./proyectosIndex.php">Proyectos</a>
    <?php elseif($_SESSION['user']['rol'] == 'secretaria') :?>
        <a href="./clientesIndex.php">Clientes</a>
        <a href="./proyectosIndex.php">Proyectos</a>
    <? endif; ?>

        <a href="../controllers/logout.php"><span class="fas fa-sign-out-alt"></span> Salir</a>
    </div>
    <hr>
    <!--Pie de pagina-->
    <footer>Copyright &copy 2020</footer>
</div>

<!--Main principal-->
<div id="main">
    <span id="btn-menu" onclick="sidebar()">&#9776</span>