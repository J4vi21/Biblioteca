<?php
namespace APP\Dao;
require_once __DIR__ . '/Db.php';
use PDO;
use APP\Dao\Db;

class DAO_libros{
    private $conn;

    public function __construct(){
        $this->conn = Db::getConnection();
    }

    public function AgregarLibro($titulo, $autor, $editorial, $anio_publicacion){
         $sql = "INSERT INTO libros (titulo, autor, editorial, anio_publicacion) 
                VALUES (:titulo, :autor, :editorial, :anio_publicacion)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":titulo", $titulo);
        $stmt->bindParam(":autor", $autor);
        $stmt->bindParam(":editorial", $editorial);
        $stmt->bindParam(":anio_publicacion",$anio_publicacion);

        return $stmt->execute();
    }

    public function BorrarLibro($id) {
        $sql = "DELETE FROM libro WHERE id_libro = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    public function MostrarLibro($busqueda,$orden) {
        $sql = "SELECT * FROM libros 
            WHERE titulo LIKE :busqueda 
            OR autor LIKE :busqueda
            OR editorial LIKE :busqueda 
            OR anio_publicacion LIKE :busqueda";
        $param = "%" . $busqueda . "%";

        switch ($orden) {
        case 'titulo':
            $sql .= " ORDER BY titulo ASC";
            break;
        case 'autor':
            $sql .= " ORDER BY autor ASC";
            break;
        case 'todos':
            $sql .= " ORDER BY ASC";
            break;
    }
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":busqueda", $param, PDO::PARAM_STR);
        $stmt->execute();
        $libros = $stmt->fetchAll(PDO::FETCH_ASSOC); // DEVUELVE UN REGISTRO

      

        return $libros;
    }


    public function ActualizarLibro($id, $titulo, $autor, $editorial, $anio_publicacion) {
        $sql = "UPDATE libros SET titulo = :titulo, autor = :autor, editorial = :editorial, 
        anio_publicacion = :anio_publicacion WHERE id_libro = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":titulo", $titulo);
        $stmt->bindParam(":autor", $autor);
        $stmt->bindParam(":editorial", $editorial);
        $stmt->bindParam(":anio_publicacion", $anio_publicacion);

        return $stmt->execute();
    }

}