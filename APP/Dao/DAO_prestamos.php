<?php
namespace APP\Dao;
require_once __DIR__ . '/Db.php';
use PDO;
use APP\Dao\Db;

class DAO_prestamos{
    private $conn;

    public function __construct() {
        $this->conn = Db::getConnection();
    }

    public function AgregarPrestamo($fecha_prestamo, $fecha_devolucion, $multa, $cantidad_libros){
         $sql = "INSERT INTO prestamos (fecha_prestamo, fecha_devolucion, multa, cantidad_libros) 
                VALUES (:fecha_prestamo, :fecha_devolucion, :multa, :cantidad_libros)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":fecha_prestamo", $fecha_prestamo);
        $stmt->bindParam(":fecha_devolucion", $fecha_devolucion);
        $stmt->bindParam(":multa", $multa);
        $stmt->bindParam(":cantidad_libros",$cantidad_libros);

        return $stmt->execute();
    }

    public function BorrarPrestamo($id) {
        $sql = "DELETE FROM prestamos WHERE id_prestamo = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    public function MostrarPrestamo($id) {
        $sql = "SELECT * FROM prestamos WHERE id_pretamo = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // DEVUELVE UN REGISTRO
    }

    public function MostrarPrestamos($busqueda) {
        $sql = "SELECT * FROM prestamos 
            WHERE fecha_prestamo LIKE :busqueda 
            OR fecha_devolucion LIKE :busqueda
            OR multa LIKE :busqueda 
            OR cantidad_libros LIKE :busqueda";
        
        $param = "%" . $busqueda . "%";


        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":busqueda", $param, PDO::PARAM_STR);
        $stmt->execute();
        $prestamos = $stmt->fetchAll(PDO::FETCH_ASSOC); // DEVUELVE UN REGISTRO

      

        return $prestamos;
    }

    public function ActualizarPrestamos($id, $fecha_prestamo, $fecha_devolucion, $multa, $cantidad_libros) {
        $sql = "UPDATE prestamos SET fecha_prestamo = :fecha_prestamo, fecha_devolucion = :fecha_devolucion, multa = :multa, 
        cantidad_libros = :cantidad_libros WHERE id_prestamo = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":fecha_prestamo", $fecha_prestamo);
        $stmt->bindParam(":fecha_devolucion", $fecha_devolucion);
        $stmt->bindParam(":multa", $multa);
        $stmt->bindParam(":cantidad_libros", $cantidad_libros);

        return $stmt->execute();
    }
}