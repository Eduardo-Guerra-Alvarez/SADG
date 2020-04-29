<?php 
    require_once '../controllers/conexion.php';
    require_once 'autoload.php';

    if(isset($_GET)) {
        if ($_GET['decision'] == 'trabajador') {
            trabajadores($conn);
        } else if ($_GET['decision'] == 'cliente') {
            clientes($conn);
        }
    }

    function trabajadores($conn) {
        $faker =  Faker\Factory::create();
        for ($i=0; $i < 10; $i++) { 
            $nombre = $faker->firstNameMale;
            $apellidos = $faker->lastName;
            $direccion = $faker->secondaryAddress;
            $telefono = $faker->numberBetween($min = 3300000000, $max = 339999999);
            $correo = $faker->email;
            $password = $faker->word;
            $salario = $faker->numberBetween($min = 1000, $max = 50000);
            $rol = substr($faker->jobTitle, 0, 20);

            $pass = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);
            $sql = "INSERT INTO trabajadores VALUES(NULL, '$nombre', '$apellidos', '$direccion', '$telefono',
                '$correo', '$pass', $salario, '$rol');";

            if (!mysqli_query($conn, $sql)) {
                echo mysqli_error($conn);
            }
        }
    }

    function clientes($conn) {
        $faker =  Faker\Factory::create();
        for ($i=0; $i < 10; $i++) { 
            $nombre = $faker->firstNameMale;
            $apellidos = $faker->lastName;
            $direccion = $faker->secondaryAddress;
            $ciudad = $faker->city;
            $telefono = $faker->numberBetween($min = 3300000000, $max = 339999999);
            $correo = $faker->email;

            $sql = "INSERT INTO clientes VALUES(NULL, '$nombre', '$apellidos', '$direccion', '$ciudad','$telefono', '$correo');";

            if (!mysqli_query($conn, $sql)) {
                echo mysqli_error($conn);
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="faker.php?decision=cliente">Clientes</a>
    <a href="faker.php?decision=trabajador">Trabajadores</a>
</body>
</html>