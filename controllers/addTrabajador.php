<?php
    require_once './conexion.php';
    // Se valida que si exista el POST
    if (isset($_POST)) {
        $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conn, $_POST['nombre']) : false;
        $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($conn, $_POST['apellidos']) : false;
        $direccion = isset($_POST['direccion']) ? mysqli_real_escape_string($conn, $_POST['direccion']) : false;
        $telefono = isset($_POST['telefono']) ? mysqli_real_escape_string($conn, $_POST['telefono']) : false;
        $correo = isset($_POST['correo']) ? mysqli_real_escape_string($conn, $_POST['correo']) : false;
        $password = isset($_POST['password']) ? mysqli_real_escape_string($conn, $_POST['password']) : false;
        $salario = isset($_POST['salario']) ? mysqli_real_escape_string($conn, $_POST['salario']) : false;
        $rol = isset($_POST['rol']) ? mysqli_real_escape_string($conn, $_POST['rol']) : false;
        
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
        if (empty($telefono) || !preg_match("/[0-9]/", $telefono)) {
            $errores['telefono'] = 'Telefono invalido';
        }
        if (empty($correo) || !filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $errores['correo'] = 'Correo invalido';
        }
        $sql = "SELECT * FROM trabajadores WHERE correo = '$correo'";
        $existe = mysqli_query($conn, $sql);
        if(mysqli_num_rows($existe) >= 1) {
            $errores['correo'] = 'El correo ya existe';
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

            $sql = "INSERT INTO trabajadores VALUES(NULL, '$nombre', '$apellidos', '$direccion', '$telefono',
            '$correo', '$pass', $salario, '$rol');";

            if (mysqli_query($conn, $sql)) {
                $_SESSION['aceptado'] = 'Trabajador registrado con exito';
                header('Location: ../views/trabajadoresIndex.php');
            } else {
                $_SESSION['error'] = 'Fallo al guardar trabajador';
                header('Location: ../views/trabajadoresIndex.php');
            }
        } else {
            $_SESSION['error'] = 'Fallo al guardar trabajador';
            $_SESSION['errores'] = $errores;
            header('Location: ../views/trabajadoresIndex.php');
        }
    }
?>