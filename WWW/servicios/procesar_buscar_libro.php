<?php
require_once __DIR__ . '/../../APP/Dao/DAO_libros.php';
use App\Dao\DAO_libros;
$busqueda = "";
$estado ="";
$orden = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $busqueda = $_POST["busqueda"];
    $orden = $_POST["orden"];
}
echo $estado;
$dao = new DAO_libros();
$dao -> MostrarLibro($busqueda, $orden);
?>