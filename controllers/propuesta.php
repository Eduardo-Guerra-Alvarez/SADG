<?php
    require_once('./conexion.php');

    $id_proyecto = $_POST['id_proyecto'];
    $id_trabajador = $_POST['id_trabajador'];

    if($_FILES['propuesta']['name'] != "") {
        // Pasamos el array a una variable
        $propuestas = $_FILES['propuesta'];
        $nombre = $propuestas['name'];

        if (!is_dir('../archives')) {
            mkdir('../archives', 0777);
        }

        // Movemos el archivo a nuestra carpeta de nuestro servidor
        move_uploaded_file($propuestas['tmp_name'], '../archives/' . $propuestas['name']);

        $sql = "INSERT INTO propuestas VALUES(NUll, '$id_proyecto', '$id_trabajador', '$nombre', DEFAULT)";

        if (mysqli_query($conn, $sql)) {
            // Retorna con un mensaje de aceptacion
            $_SESSION['aceptado'] = 'Archivo enviado correctamente';
            header("Location: ../views/proyectosShow.php?id=$id_proyecto");
        } else {
            $_SESSION['error'] = 'Fallo al guardar archivo';
            header('Location: ../views/proyectosShow.php?id=$id_proyecto');
        }

    } else {
        // Retorna con un mensaje de error
        $_SESSION['error'] = 'No se a cargado ningun archivo';
        header("Location: ../views/proyectosShow.php?id=$id_proyecto");
    }

?>