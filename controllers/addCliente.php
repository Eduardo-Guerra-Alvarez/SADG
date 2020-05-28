<?php
    require_once './conexion.php';
    // Se valida que si exista el POST
    if (isset($_POST)) {
        $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conn, $_POST['nombre']) : false;
        $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($conn, $_POST['apellidos']) : false;
        $direccion = isset($_POST['direccion']) ? mysqli_real_escape_string($conn, $_POST['direccion']) : false;
        $ciudad = isset($_POST['ciudad']) ? mysqli_real_escape_string($conn, $_POST['ciudad']) : false;
        $telefono = isset($_POST['telefono']) ? mysqli_real_escape_string($conn, $_POST['telefono']) : false;
        $correo = isset($_POST['correo']) ? mysqli_real_escape_string($conn, $_POST['correo']) : false;
        
        //Array de errores
        $errores = array();
        if (empty($nombre) || preg_match("/[0-9]/", $nombre)) {
            $errores['nombre'] = 'Nombre invalido';
        }
        if (empty($apellidos) || preg_match("/[0-9]/", $apellidos)) {
            $errores['apellidos'] = 'Apellidos invalidos';
        }
        if (empty($direccion)) {
            $errores['direccion'] = 'Direccion invalida';
        }
        if (empty($ciudad) || preg_match("/[0-9]/", $ciudad)) {
            $errores['ciudad'] = 'Ciudad invalida';
        }
        if (empty($telefono) || !preg_match("/[0-9]/", $telefono)) {
            $errores['telefono'] = 'Telefono invalido';
        }
        if (empty($correo) || !filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $errores['correo'] = 'Correo invalido';
        }

        if (count($errores) == 0) {

            $sql = "INSERT INTO clientes VALUES(NULL, '$nombre', '$apellidos', '$direccion', '$ciudad','$telefono',
            '$correo');";

            if (mysqli_query($conn, $sql)) {
                $_SESSION['aceptado'] = 'Cliente registrado con exito';
                header('Location: ../views/clientesIndex.php');
            } else {
                $_SESSION['error'] = 'Fallo al guardar cliente';
                header('Location: ../views/clientesIndex.php');
            }
        } else {
            $_SESSION['errores'] = $errores;
        }
    }
?>