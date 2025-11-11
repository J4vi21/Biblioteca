<?php
session_start();
if (!isset($_SESSION['usuario'])) {
   header('Location: login.php');
   
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
    <title>Socios</title>
</head>
<body>
  

 <nav class="navbar">
        <ul>
            <li><a href="Index.php">📚 Inicio</a></li>
            
            <li class="dropdown">
                <a href="#">Libros</a>
                <ul class="submenu">
                    <li><a href="libros.php">Registrar Libro</a></li>
                    <li><a href="buscar_libro.php">Buscar libro</a></li>
                </ul>
            </li>
            
            <li class="dropdown">
                <a href="#">Préstamos</a>
                <ul class="submenu">
                    <li><a href="prestamos.php">Registrar Préstamo</a></li>
                    <li><a href="buscar_prestamo.php">Buscar Préstamo</a></li>
                </ul>
            </li>
            
            <li class="dropdown">
                <a href="#">Socios</a>
                <ul class="submenu">
                    <li><a href="socios.php">Agregar Socio</a></li>
                    <li><a href="buscar_socio.php">Buscar Socio</a></li>
                </ul>
            </li>
        </ul>
        <div class="titulo-navbar">Biblioteca Popular Coronel Pringles</div>

        <a href="servicios/procesar_logout.php" class="logout-button">🚪 Cerrar Sesión</a>
    </nav>

    <div class="contenido">
<div class="formularios">
            <form  action="servicios/procesar_socios.php" method="post">
                  
            
              <h2>Registrar un nuevo Socio</h2>
            
                <label for="dni">DNI:</label>
                <input type="int" name="dni" id="dni">
                <br>
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre">
                  <br>
                <label for="apellido">Apellido:</label>
                <input type="text" name="apellido" id="apellido">
                  <br>
                <label for="telefono">Telefono:</label>
                <input type="int" name="telefono" id="telefono">
                  <br>
                <label for="email">Direccion:</label>
                <input type="text" name="direccion" id="direccion">
                  <br>
                <input type="submit" value="Registrar socio">

            </form>
        </div>
</div>

<footer style="background-color: #353535; color: white; padding: 20px 0; text-align: center;">
    <div style="max-width: 1000px; margin: auto;">
        <p style="font-size: 18px; margin-bottom: 10px;"><strong>Biblioteca Popular Coronel Pringles</strong></p>
        
        <p style="margin: 5px 0;">
            Sistema de Inventario de Libros © 2025
        </p>
        
        <p style="margin: 5px 0;">
            Dirección: San Martin 675, Coronel pringles
        </p>

        <p style="margin: 5px 0;">
            Contacto: <a href="mailto:bibliotecaPopular@gmail.com" style="color: cadetblue;">bibliotecaPopular@gmail.com</a> | Tel: (123) 456-7890
        </p>
    </div>
</footer>
</body>