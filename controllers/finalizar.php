<?php
    require_once 'conexion.php';

    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "UPDATE proyectos SET estatus = 'Finalizado' WHERE id = '$id'";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['aceptado'] = 'A finalizado el proyecto';
        header("Location: ../views/proyectosIndex.php");
    } else {
        $_SESSION['error'] = 'No se pudo finalizar el proyecto';
        header("Location: ../views/proyectosShow.php?id='$id'");
    }
?>