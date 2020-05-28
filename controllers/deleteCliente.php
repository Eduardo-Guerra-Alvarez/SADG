<?php
    require_once 'conexion.php';

    if (isset($_GET)) {
        $id = isset($_GET['id']) ? mysqli_real_escape_string($conn, $_GET['id']) : false;

        $sql = "DELETE FROM clientes WHERE id = '$id';";

        if (mysqli_query($conn, $sql)) {

            $_SESSION['error'] = 'Cliente eliminado con exito';
            header('Location: ../views/clientesIndex.php');
        } else {
            $_SESSION['error'] = 'Operacion Fallida';
            header('Location: ../views/clientesIndex.php');
        }

    }
    header('Location ../views/clientesIndex.php');
?>