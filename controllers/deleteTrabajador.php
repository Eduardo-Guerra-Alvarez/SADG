<?php
    require_once 'conexion.php';
    if (isset($_GET)) {
        $id = isset($_GET['id']) ? mysqli_real_escape_string($conn, $_GET['id']) : false;

        $sql = "DELETE FROM trabajadores WHERE id = '$id';";

        if (mysqli_query($conn, $sql)) {

            $_SESSION['error'] = 'Trabajador eliminado con exito';
            header('Location: ../views/trabajadoresIndex.php');
        } else {
            $_SESSION['error'] = 'Operacion Fallida';
            header('Location: ../views/trabajadoresIndex.php');
        }

    }
    header('Location ../views/trabajadoresIndex.php');
?>