<?php
require_once __DIR__ . '/../../APP/Dao/DAO_socios.php';
use App\Dao\DAO_socios;

//--Inicio las variables que voy a utilizar--
$errores = [];//Creo esta variable para guardar los errores
$nombre="";
$apellido="";
$email="";
$tel="";

//--Recibo los datos del formulario mediante el POST--
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //Recibo los datos, los sanatizo y verifico
    $nombre = trim(strip_tags($_POST["nombre"]));
    $dni = filter_var($_POST["dni"], FILTER_SANITIZE_NUMBER_INT);
    $apellido = trim(strip_tags($_POST["apellido"]));
    $direccion = trim(strip_tags(($_POST["direccion"])));
    $tel = filter_var($_POST["telefono"], FILTER_SANITIZE_NUMBER_INT);
}

// --Validaciones--
    if (!filter_var($dni, FILTER_VALIDATE_INT)) {   
        $errores[] = "El DNI no es válido.";//verifico que sea un email valido
    }
    if(empty($nombre)){
        $errores[] = "El nombre es obligatorio";//Verifico que sea  un nombre valido
    }

    if(empty($apellido)){
        $errores[] = "El apellido es obligatorio";//verifico que sea un apellido valido
    }

    if (empty($direccion)) {   
        $errores[] = "La direccion no es válida.";//verifico que sea una direccion valida
    }

    if (!filter_var($tel, FILTER_VALIDATE_INT)) { 
        $errores[] = "No es un numero valido";//verifico que sea un numero valido
    }

// --Resultado--
    if(empty($errores)){//Si el arreglo de errores esta vacio significa que no tenemos errores
        echo "<div>Ingresaste los datos correctamente <br>";
        echo "nombre: $nombre <br>apellido: $apellido <br>direccion:$direccion <br>telefono: $tel <br>DNI: $dni";
        header("Refresh: 5; url= : /../../Index.html");
    }else{//Si hay datos en el arreglo errores los muestro
        echo $errores;
    }

    $dao = new DAO_socios();
    $dao -> AgregarSocio($nombre,$apellido,$dni,$tel, $direccion);
