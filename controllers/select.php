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
?>