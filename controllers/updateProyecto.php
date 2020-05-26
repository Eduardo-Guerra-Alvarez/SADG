<?php
    require_once './conexion.php';
    // Se valida que si exista el POST
    if (isset($_POST)) {
        $id = isset($_POST['id']) ? mysqli_real_escape_string($conn, $_POST['id']) : false;
        $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conn, $_POST['nombre']) : false;
        $fecha_inicio = isset($_POST['fecha_inicio']) ? mysqli_real_escape_string($conn, $_POST['fecha_inicio']) : false;
        $fecha_final = isset($_POST['fecha_final']) ? mysqli_real_escape_string($conn, $_POST['fecha_final']) : false;
        $coste = isset($_POST['coste']) ? mysqli_real_escape_string($conn, $_POST['coste']) : false;
        $id_cliente = isset($_POST['id_cliente']) ? mysqli_real_escape_string($conn, $_POST['id_cliente']) : false;
        $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($conn, $_POST['descripcion']) : false;
        
        //Array de errores
        $errores = array();
        if (empty($nombre)) {
            $errores['nombre'] = 'Nombre invalido';
        }
        if (empty($fecha_inicio)) {
            $errores['fecha_inicio'] = 'Fecha invalidos';
        }
        if (empty($fecha_final)) {
            $errores['fecha_final'] = 'Fecha invalida';
        }
        if (empty($coste) || !preg_match("/[0-9]/", $coste)) {
            $errores['coste'] = 'Coste invalido';
        }

        if (count($errores) == 0) {

            $sql = "UPDATE proyectos SET nombre = '$nombre', fecha_inicio = '$fecha_inicio', fecha_final = '$fecha_final', coste = '$coste', descripcion = '$descripcion' WHERE id = '$id'";

            if (mysqli_query($conn, $sql)) {
                $_SESSION['actualizado'] = 'Proyecto Actualizado con exito';
                header('Location: ../views/proyectosIndex.php');
            } else {
                $_SESSION['error'] = 'Fallo al guardar proyecto';
                header('Location: ../views/proyectosIndex.php');
            }
        } else {
            $_SESSION['errores'] = $errores;
        }
    }
?>