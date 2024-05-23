<?php
$localhost = 'localhost';
$user = 'root';
$password = '';
$nombreBD = 'viajes';

$conn = mysqli_connect($localhost, $user, $password, $nombreBD);
if ($conn) {
    //echo "Se conectó con la base de datos";
} else {
    echo "Error de conexion";
}

