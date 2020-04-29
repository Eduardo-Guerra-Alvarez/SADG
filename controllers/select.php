<?php 
    function select_Trabajadores($conn) {
        $sql = "SELECT * FROM trabajadores ORDER BY id ASC;";
        $trabajadores = mysqli_query($conn, $sql);
        $result = array();
        if($trabajadores) {
            $result = $trabajadores;
        }
        return $result;
    }

    function select_Clientes($conn) {
        $sql = "SELECT * FROM clientes ORDER BY id ASC;";
        $clientes = mysqli_query($conn, $sql);
        $result = array();
        if($clientes) {
            $result = $clientes;
        }
        return $result;
    }
?>