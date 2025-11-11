<?php
require_once __DIR__ . '/../../APP/Dao/DAO_libros.php';
use App\Dao\DAO_libros;

//--Inicio las variables que voy a utilizar--
$errores = [];//Creo esta variable para guardar los errores
$titulo="";
$autor="";
$editorial="";
$añopublic="";

//--Recibo los datos del formulario mediante el POST--
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //Recibo los datos, los sanatizo y verifico
    $titulo = trim(strip_tags($_POST["titulo"]));
    $autor = trim(strip_tags($_POST["autor"]));
    $editorial = trim(strip_tags($_POST["editorial"]));
    $añopublic = filter_var($_POST["anio_publicacion"], FILTER_SANITIZE_NUMBER_INT);
}

// --Validaciones--
    if (empty($añopublic)) {   
        $errores[] = "El año no es válido.";//verifico que sea un año valido
    }
    if(empty($titulo)){
        $errores[] = "El nombre es obligatorio";//Verifico que sea  un nombre valido
    }

    if(empty($autor)){
        $errores[] = "El apellido es obligatorio";//verifico que sea un apellido valido
    }

    if (empty($editorial)) {   
        $errores[] = "La editorial no existe";//verifico que sea una direccion valida
    }


// --Resultado--
    if(empty($errores)){//Si el arreglo de errores esta vacio significa que no tenemos errores
        echo "Ingresaste los datos correctamente <br>";
        echo "Titulo: $titulo <br>Autor: $autor <br>Editorial:$editorial";
        header("Refresh: 5; url= : /../../Index.html");
    }else{//Si hay datos en el arreglo errores los muestro
        print_r( $errores);
    }

    

    $dao = new DAO_libros();
    $dao -> AgregarLibro($titulo, $autor, $editorial, $añopublic);
