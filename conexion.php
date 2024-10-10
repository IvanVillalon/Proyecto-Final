<?php
$server = "127.0.0.1";
$user = "root";
$pass = "";
$db = "TOYS";

// Conectar a MySQL usando mysqli
$conn = mysqli_connect($server, $user, $pass, $db);

// Verificar conexión
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else{
    echo "conexion exitosa";    
}



?>