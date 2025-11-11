<?php
require_once __DIR__ . '/../../APP/Dao/DAO_prestamos.php';
use App\Dao\DAO_prestamos;

//--Inicio las variables que voy a utilizar--
$errores = [];//Creo esta variable para guardar los errores
$fechaPresta="";
$fechaDevo="";
$cantidadlib="";
$multa="";

//--Recibo los datos del formulario mediante el POST--
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //Recibo los datos, los sanatizo y verifico
    $fechaPresta = ($_POST["fecha_prestamo"]);
    $fechaDevo = ($_POST["fecha_devolucion"]);
    $multa = ($_POST["multa"]);
    $cantidadlib = filter_var($_POST["cantidad_libros"], FILTER_SANITIZE_NUMBER_INT);
}

// --Validaciones--
    if (empty($fechaPresta)) {   
        $errores[] = "Fecha prestado no exites";//verifico que sea un año valido
    }
    if ($multa = "") {   
        $errores[] = "ingrese la cantidad de multas";//verifico que sea un año valido
    }
    

    if (empty($cantidadlib)) {   
        $errores[] = "Cantidad de libros";//verifico que sea una direccion valida
    }


// --Resultado--
    if(empty($errores)){//Si el arreglo de errores esta vacio significa que no tenemos errores
        echo "Ingresaste los datos correctamente <br>";
        echo "Fecha del prestamo: $fechaPresta <br>Fecha de devolucion: $fechaDevo <br>cantidad de libros:$cantidadlib";
        header("Refresh: 3; url= : ../Index.php");
    }else{//Si hay datos en el arreglo errores los muestro
        print_r($errores);
    }

    $dao = new DAO_prestamos();
    $dao ->AgregarPrestamo($fechaPresta, $fechaDevo,$multa,$cantidadlib);