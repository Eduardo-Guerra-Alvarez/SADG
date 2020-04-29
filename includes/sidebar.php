<?php require_once '../controllers/conexion.php' ?>
<!--Menu-->
<div id="mySidenav" class="sidenav">
    <div id="user">
        <span class="fas fa-user fa-6x"></span>
        <h4> <?= strtoupper($_SESSION['user']['rol']) ?> </h4>
    </div>
    <hr>
    <div id="enlace">
        <a href="./trabajadoresIndex.php">Trabajadores</a>
        <a href="./clientesIndex.php">Clientes</a>
        <a href="./proyectosIndex.php">Proyectos</a>
        <a href="../controllers/logout.php"><span class="fas fa-sign-out-alt"></span> Salir</a>
    </div>
    <hr>
    <!--Pie de pagina-->
    <footer>Copyright &copy 2020</footer>
</div>

<!--Main principal-->
<div id="main">
    <span id="btn-menu" onclick="sidebar()">&#9776</span>