<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Habilitar errores para depuración
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'conexion.php';

if($_SERVER["REQUEST_METHOD"]== "POST"){
    $accion= $_POST['accion'] ?? '';

    switch($accion){
        case 'registrar':
               // Validar y procesar registro
    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $direccion = trim($_POST['direccion']);
    $telefono = trim($_POST['telefono']);
    $contraseña= trim($_POST['contrasena']);

    // Validaciones
    if (empty($nombre) || empty($email) || empty($contraseña) || empty($direccion) || empty($telefono)) {
        die("Por favor, completa todos los campos.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Formato de correo no válido.");
    }

    // Insertar el nuevo donante
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email,contraseña, direccion, telefono) VALUES (?, ?, ?, ?, ? )");
    $stmt->bind_param("sssss", $nombre, $email, $contraseña, $direccion, $telefono);
    if ($stmt->execute()) {
        // Obtener el ID del usuario recién insertado
        $id_user = $stmt->insert_id; // <-- Este es el ID generado
        $_SESSION['id_user'] = $id_user; // Guardar el id_user en la sesión
        $_SESSION['nombre'] = $nombre;
        $_SESSION['email'] = $email;
        $_SESSION['telefono']= $telefono;
        $_SESSION['contrasena']= $contraseña;

        echo "Registro exitoso.";
        header('Location: index.html');
        exit();
    } else {
        die("Error al registrar: " . $stmt->error);
    }
    $stmt->close();
    
            break;
        case 'iniciar_sesion':
            $nombre = trim($_POST['nombre_user']);
            $contraseña= trim($_POST['contrasena']);

            if(empty($nombre)  || empty($contraseña) ){
                die("Por favor, completa todos los campos");
            }
            $stmt= $conn->prepare("SELECT ID, nombre, contraseña FROM usuarios WHERE nombre= ? AND contraseña= ?");

            $stmt->bind_param("ss", $nombre , $contraseña);
            $stmt->execute();
            $result= $stmt ->get_result();
            if($result ->num_rows == 1){
                $user= $result->fetch_assoc();
                $user_id= $user['ID'];
                $_SESSION['nombre']= $nombre;
            
                $_SESSION['user_id']= $user_id;
                echo "SESION DE: " . $_SESSION['user_id'];
                header('Location: index.php');
            }else{
                echo "Incorrecto";
                session_abort();
                session_unset();
            
            }

            
    }
}





?>