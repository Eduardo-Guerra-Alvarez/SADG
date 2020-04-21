<?php 
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'SADG';

    // Nos conectamos a la base de datos
    $conn = mysqli_connect($host, $user, $password, $database);

    if (!$conn) {
        die("Conexión fallida " . mysqli_connect_error());
    }
?>