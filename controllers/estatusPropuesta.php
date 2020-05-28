<?php
    require_once './conexion.php';

    $id_prop = $_GET['id_prop'];
    $id_pro = $_GET['id_pro'];

    if ($_GET['estatus'] == "1") {
        $sql = "UPDATE propuestas SET estatus = 'Aprobado' WHERE id = '$id_prop'";
    }

    if (mysqli_query($conn, $sql)) {
        $sql = "UPDATE proyectos SET estatus = 'Produccion' WHERE id = '$id_pro'";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['aceptado'] = 'Estatus modificado';
            header("Location: ../views/proyectosShow.php?id=$id_pro");
        } else {
            $_SESSION['error'] = 'Fallo en Actualizar';
            header("Location: ../views/proyectosShow.php?id=$id_pro");
        }
    } else {
        $_SESSION['error'] = 'No se pudo modificar Estatus';
        header("Location: ../views/proyectosShow.php?id=$id_pro");
    }
?>