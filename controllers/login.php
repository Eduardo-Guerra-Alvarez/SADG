<?php 
    require_once 'conexion.php';
    if (isset($_POST)) {
        $correo = isset($_POST['correo']) ? mysqli_real_escape_string($conn, $_POST['correo']) : false;
        $password = isset($_POST['password']) ? mysqli_real_escape_string($conn, $_POST['password']) : false;

        $sql = "SELECT * FROM trabajadores WHERE correo = '$correo';";
        $login = mysqli_query($conn, $sql);

        if ($login && mysqli_num_rows($login) == 1) {
            $user = mysqli_fetch_assoc($login);

            if (password_verify($password ,$user['password'])) {
                $_SESSION['user'] = $user;
                if ($user['rol'] == 'administrador') {
                    header('Location: ../views/trabajadoresIndex.php');
                } else if ($user['rol'] == 'secretaria') {
                    header('Location: ../views/clientesIndex.php');
                } else if ($user['rol'] == 'diseñador' || $user['rol'] == 'gestor') {
                    header('Location: ../views/proyectosIndex.php');
                }
            } else {
                $_SESSION['error'] = 'Contraseña incorrecta';
                header('Location: ../views/index.php');
            }
        } else {
            $_SESSION['error'] = 'Correo incorrecto';
            header('Location: ../views/index.php');
        }
    }
?>