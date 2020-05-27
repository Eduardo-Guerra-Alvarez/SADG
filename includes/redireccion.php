<?php
    session_start();

    if (!isset($_SESSION['user'])) {
        header('Location: index.php');
    } else {
        if ($_SESSION['user']['rol'] == 'gestor' || $_SESSION['user']['rol'] == 'diseñador') {
            header('Location: proyectosIndex.php');
        }
    }
?>