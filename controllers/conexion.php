<?php 
    session_start();
    
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'SADG';

    // Nos conectamos a la base de datos
    $conn = mysqli_connect($host, $user, $password, $database);
    mysqli_set_charset($conn, "utf8");

    if (!$conn) {
        die("Conexión fallida " . mysqli_connect_error());
    }
?>