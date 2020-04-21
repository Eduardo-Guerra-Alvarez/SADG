<?php
    require_once './conexion.php';

    // Se valida que si exista el POST
    if (isset($_POST)) {
        $nombre = isset($_POST['nombre']) ? mysqli_real_scape_string($_POST['nombre']) : false;
        $apellidos = isset($_POST['apellidos']) ? mysqli_real_scape_string($_POST['apellidos']) : false;
        $direccion = isset($_POST['direccion']) ? mysqli_real_scape_string($_POST['direccion']) : false;
        $telefono = isset($_POST['telefono']) ? mysqli_real_scape_string($_POST['telefono']) : false;
        $correo = isset($_POST['correo']) ? mysqli_real_scape_string($_POST['correo']) : false;
        $password = isset($_POST['password']) ? mysqli_real_scape_string($_POST['password']) : false;
        $salario = isset($_POST['salario']) ? mysqli_real_scape_string($_POST['salario']) : false;
        $rol = isset($_POST['rol']) ? mysqli_real_scape_string($_POST['rol']) : false;
        
        //Array de errores
        $errores = array();
        if (empty($nombre) || !preg_match("/[0-9]/", $nombre)) {
            $errores['nombre'] = 'Nombre invalido';
        }
        if (empty($apellidos) || !preg_match("/[0-9]/", $apellidos)) {
            $errores['apellidos'] = 'Apellidos invalidos';
        }
        if (empty($direccion)) {
            $errores['direccion'] = 'Direccion invalida';
        }
        if (empty($telefono) || preg_match("/[0-9]/", $telefono)) {
            $errores['telefono'] = 'Telefono invalido';
        }
        if (empty($correo) || filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $errores['correo'] = 'Correo invalido';
        }
        if (empty($password)) {
            $errores['password'] = 'Contraseña invalida';
        }
        if (empty($salario)) {
            $errores['salario'] = 'Salario invalido';
        }

        if (count($errores) == 0) {
            // Cifrar contraseña
            $pass = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);

        }
    }
?>