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
    <title>Registrar Libro</title>
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
    <h2>Registrar Libro en Inventario</h2>
    <form action="servicios/procesar_libros.php" method="post">
        
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" required>

        <label for="autor">Autor del libro:</label>
        <input type="text" name="autor" id="autor" required>

        <label for="editorial">Editorial:</label>
        <input type="text" name="editorial" id="editorial">

        <label for="anio_publicacion">Año de publicación:</label>
        <input type="int" name="anio_publicacion" id="anio_publicacion" min="1000" max="9999">

        <input type="submit" value="Registrar libro">
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