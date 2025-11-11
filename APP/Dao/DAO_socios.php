<?php
namespace APP\Dao;
require_once __DIR__ . '/Db.php';
use PDO;
use APP\Dao\Db;

class DAO_socios {
    private $conn;

    public function __construct() {
        $this->conn = Db::getConnection(); // CORREGIDO
    }

    public function AgregarSocio($nombre, $apellido, $dni, $telefono, $direc) {
        $sql = "INSERT INTO socios (dni, nombre, apellido, telefono, direccion) 
                VALUES (:dni, :nombre, :apellido, :telefono, :direccion)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":dni", $dni);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":apellido", $apellido);
        $stmt->bindParam(":direccion", $direc);
        $stmt->bindParam(":telefono", $telefono);

        return $stmt->execute();
    }

    public function BorrarSocio($id) {
        $sql = "DELETE FROM socios WHERE id_socios = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

   

    public function MostrarSocios($busqueda) {
        $sql = "SELECT * FROM socios 
            WHERE dni LIKE :busqueda 
            OR apellido LIKE :busqueda
            OR nombre LIKE :busqueda 
            OR telefono LIKE :busqueda
            OR direccion LIKE :busqueda";
        $param = "%" . $busqueda . "%";


        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":busqueda", $param, PDO::PARAM_STR);
        $stmt->execute();
        $socios = $stmt->fetchAll(PDO::FETCH_ASSOC); // DEVUELVE UN REGISTRO

      

        return $socios;
    }

    public function ActualizarSocio($id, $nombre, $apellido, $dni, $telefono, $direc) {
        $sql = "UPDATE socios 
                SET dni = :dni, nombre = :nombre, apellido = :apellido, 
                    direccion = :direccion, telefono = :telefono 
                WHERE id_socios = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":dni", $dni);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":apellido", $apellido);
        $stmt->bindParam(":direccion", $direc);
        $stmt->bindParam(":telefono", $telefono);

        return $stmt->execute();
    }
}
