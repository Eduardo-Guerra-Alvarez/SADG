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
        $sql = "SELECT p.id, p.nombre, p.fecha_inicio, p.fecha_final, p.coste, p.estatus, p.descripcion,CONCAT(c.nombre, ' ', c.apellidos) AS cliente FROM proyectos AS p LEFT JOIN clientes AS c ON p.id_cliente = c.id;";
        $proyectos = mysqli_query($conn, $sql);
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
        return $trabajadores;
    }
?>