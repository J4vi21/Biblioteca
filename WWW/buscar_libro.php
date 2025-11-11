<?php
session_start();
if (!isset($_SESSION['usuario'])) {
   header('Location: login.php');
   
    exit();
}
?>

<?php
require_once __DIR__ . '/../APP/Dao/DAO_libros.php';

use App\Dao\DAO_libros;


$busqueda = "";
$orden = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $busqueda = $_POST["busqueda"];
    $orden = $_POST["orden"];
}

$dao = new DAO_libros();
$libros =  $dao -> MostrarLibro($busqueda,$orden);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
    <title>Buscar libro</title>
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
        <div class="search-container">
            <h2>Buscar Libros</h2>
            
            <form class="search-form" method="post" action="">
                <div class="search-input-wrapper">
                    <input 
                        type="text" 
                        name="busqueda" 
                        class="search-input" 
                        placeholder="Buscar por título, autor, ISBN..."
                        value="">
                    <span class="search-icon">🔍</span>
                    
                </div>
                <button type="submit" class="search-button">BUSCAR</button>

                <div class="filter-group">
                    <label for="orden">Ordenar por</label>
                    <select name="orden" id="orden">
                        <option value="titulo">Título</option>
                        <option value="autor">Autor</option>
                    </select>
                </div>
            </div>
            
            </form>
            
            <div class="results-container">
            <div class="results-header">
                📚 Resultados de la búsqueda 
            </div>
            <?php foreach ($libros as $libro): ?>
             <div class="book-item">
                <div class="book-title"><?php echo htmlspecialchars($libro['titulo']);?></div>
                <div class="book-info"><strong>Autor:</strong><?php echo htmlspecialchars($libro['autor']);?></div>
                <div class="book-info"><strong>Editorial:</strong><?php echo htmlspecialchars($libro['editorial']);?></div>
                <div class="book-info"><strong>Año:</strong><?php echo htmlspecialchars($libro['anio_publicacion']);?></div>
                <div class="book-info"><strong>stock:</strong><?php echo htmlspecialchars($libro['stock']);?></div>
                
            </div>
             <?php endforeach; ?>
        </div>
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
</html>