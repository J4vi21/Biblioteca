<?php

require_once __DIR__ . '/../../App/Dao/DAO_usuario.php';

use App\Dao\DAO_usuario;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // Validar campos vacíos
    if (empty($usuario) || empty($password)) {
        echo "Por favor complete todos los campos.";
        exit;
    }

    // Crear instancia del DAO
    $dao = new DAO_usuario();

    // Intentar login
    $resultado = $dao->buscarUsuario($usuario, $password);

    if ($resultado) {
        // Guardar datos de sesión
        $_SESSION['usuario'] = $resultado['usuario'];  

        // Redirigir a la página principal
        header("Location: ../index.php");
        exit;
    } else {
        // Mostrar mensaje de error
        echo "Usuario o contraseña incorrectos.";
    }
} else {
    echo "Método de acceso no permitido.";
}
