<?php require_once '../controllers/conexion.php' ?>
<!--Menu-->
<div id="mySidenav" class="sidenav">
    <div id="user">
        <span class="fas fa-user fa-6x"></span>
        <h4> <?= strtoupper($_SESSION['user']['rol']) ?> </h4>
    </div>
    <hr>
    <div>
        <a href="#">Trabajadores</a>
        <a href="#">Clientes</a>
        <a href="#">Proyectos</a>
        <a href="../controllers/logout.php"><span class="fas fa-sign-out-alt"></span> Salir</a>
    </div>
    <hr>
    <!--Integrantes del equipo-->
    <div id="integrantes">
        <h2>Integrantes: </h2>
        <p>Eduardo Guerra Alvarez</p>
        <p>Luis Armando Prado Nuñez</p>
        <p>José Luis Serna Serna</p>
        <p>Raúl de Jesús Simental Magaña</p>
    </div>
    <!--Pie de pagina-->
    <footer>Copyright &copy 2020</footer>
</div>

<!--Main principal-->
<div id="main">
    <span id="btn-menu" onclick="sidebar()">&#9776</span>