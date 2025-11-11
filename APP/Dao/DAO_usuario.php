<?php
namespace APP\Dao;
require_once __DIR__ . '/Db.php';
use PDO;
use APP\Dao\Db;

class DAO_usuario {
    private $conn;

    public function __construct() {
        $this->conn = Db::getConnection();
    }

    public function buscarUsuario($usuario, $password) {
        $sql = "SELECT * FROM usuarios WHERE usuario = :usuario";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":usuario", $usuario, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user; // ✅ devuelve los datos del usuario
        }

        return false; // ❌ usuario no encontrado o contraseña incorrecta
    }
}
