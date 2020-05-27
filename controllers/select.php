<?php 
    function select_Trabajadores($conn) {
        $sql = "SELECT * FROM trabajadores ORDER BY id DESC;";
        $trabajadores = mysqli_query($conn, $sql);
        $result = array();
        if($trabajadores) {
            $result = $trabajadores;
        }
        return $result;
    }

    function select_Clientes($conn) {
        $sql = "SELECT * FROM clientes ORDER BY id DESC;";
        $clientes = mysqli_query($conn, $sql);
        $result = array();
        if($clientes) {
            $result = $clientes;
        }
        return $result;
    }

    function select_Proyectos($conn) {
        if ($_SESSION['user']['rol'] != 'diseñador') {
            $sql = "SELECT p.id, p.nombre, p.fecha_inicio, p.fecha_final, p.coste, p.estatus, p.descripcion,CONCAT(c.nombre, ' ', c.apellidos) AS cliente FROM proyectos AS p LEFT JOIN clientes AS c ON p.id_cliente = c.id;";
            $proyectos = mysqli_query($conn, $sql);
        } else {
            $trab = $_SESSION['user']['id'];
            $sql = "SELECT p.id, p.nombre, p.fecha_inicio, p.fecha_final, p.coste, p.estatus, p.descripcion,CONCAT(c.nombre, ' ', c.apellidos) AS cliente FROM proyecto_trabajador AS pt LEFT JOIN proyectos AS p ON pt.id_proyecto = p.id
            LEFT JOIN clientes AS c ON p.id_cliente = c.id WHERE pt.id_trabajador = '$trab';";

            $proyectos = mysqli_query($conn, $sql);
        }
        $result = array();
        if($proyectos) {
            $result = $proyectos;
        }
        return $result;
    }

    function select_ProyectosShow($conn, $id) {
        $sql = "SELECT p.id, p.nombre, p.fecha_inicio, p.fecha_final, p.coste, p.estatus, p.descripcion,CONCAT(c.nombre, ' ', c.apellidos) AS cliente FROM proyectos AS p LEFT JOIN clientes AS c ON p.id_cliente = c.id WHERE p.id = '$id';";
        
        $proyectos = mysqli_query($conn, $sql);
        $result = array();
        if($proyectos) {
            $result = $proyectos;
        }
        return $result;
    }

    function select_ProyTrab($conn, $id) {
        $sql = "SELECT t.id, CONCAT(t.nombre, ' ', t.apellidos) AS trabajador FROM proyecto_trabajador AS p RIGHT JOIN trabajadores AS t ON p.id_trabajador = t.id WHERE p.id_proyecto = '$id';";

        $trabajadores = mysqli_query($conn, $sql);
        $result = array();
        if($trabajadores) {
            $result = $trabajadores;
        }
        return $result;
    }

    function select_Propuestas($conn, $id) {

        if ($_SESSION['user']['rol'] == 'gestor') {
            $sql = "SELECT p.nombre AS propuesta, CONCAT(t.nombre, ' ', t.apellidos) AS trabajador FROM propuestas AS p INNER JOIN trabajadores AS t ON p.id_trabajador = t.id WHERE p.id_proyecto = '$id'";

            $propuesta = mysqli_query($conn, $sql);
        } else if ($_SESSION['user']['rol'] == 'diseñador') {
            $id_trab = $_SESSION['user']['id'];
            $sql = "SELECT p.nombre AS propuesta, CONCAT(t.nombre, ' ', t.apellidos) AS trabajador FROM propuestas AS p INNER JOIN trabajadores AS t ON p.id_trabajador = t.id WHERE p.id_proyecto = '$id' AND p.id_trabajador = '$id_trab'";

            $propuesta = mysqli_query($conn, $sql);
        }
        
        $result = array();
        if ($propuesta) {
            $result = $propuesta;
        }
        return $result;
    }
?>