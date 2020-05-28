<?php
    require_once './conexion.php';

    if (isset($_POST)) {
        $trabajadores = $_POST['trabajadores'];
        $proyecto = $_POST['id_proyecto'];

        $error = false;
        if (empty($trabajadores)) {
            $error = true;
        }
        if (empty($proyecto)) {
            $error = true;
        }
        if ($error == false) {
            $falla = false;
            for ($i=0; $i < count($trabajadores); $i++) { 
                $sql = "INSERT INTO proyecto_trabajador VALUES('$proyecto', '$trabajadores[$i]');";
                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    $falla = true;
                    $_SESSION['error'] = 'Fallo al seleccionar Trabajadores';
                    header("Location: ../views/proyectosShow.php?id=$proyecto");
                }
            }
            if ($falla == false) {
                $sql = "UPDATE proyectos SET estatus = 'Propuesta' WHERE id = '$proyecto';";
                $result = mysqli_query($conn, $sql);
                $_SESSION['aceptado'] = 'Trabajador seleccionados con exito';
                header("Location: ../views/proyectosShow.php?id=$proyecto");
            }
        } else {
            $_SESSION['error'] = 'No hay trabajadores por seleccionar';
                header("Location: ../views/proyectosShow.php?id=$proyecto");
        }
        header("Location: ../views/proyectosShow.php?id=$proyecto");
    }
?>