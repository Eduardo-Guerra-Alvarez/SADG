<?php
    require_once 'conexion.php';
    if (isset($_GET)) {
        $idP = isset($_GET['idP']) ? mysqli_real_escape_string($conn, $_GET['idP']) : false;
        $idT = isset($_GET['idT']) ? mysqli_real_escape_string($conn, $_GET['idT']) : false;

        $sql = "DELETE FROM proyecto_trabajador WHERE id_proyecto = '$idP' AND id_trabajador = '$idT';";

        if (mysqli_query($conn, $sql)) {
            $_SESSION['error'] = 'Trabajador eliminado con exito';
            header("Location: ../views/proyectosShow.php?id=$idP");
        } else {
            $_SESSION['error'] = 'Operacion Fallida';
            header("Location: ../views/proyectosShow.php?id=$idP");
        }

    }
    header('Location ../views/trabajadoresIndex.php');
?>