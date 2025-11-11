<?php
namespace APP\Dao;
use PDO;
use PDOException;
class Db {
    private static $conn = null;

    private function __construct() {} // Evitar instancias

 //
    public static function getConnection() {
        if (self::$conn === null) {
            try {
                $dsn = "mysql:host=localhost;dbname=biblioteca_coronel_pringles;charset=utf8";
                self::$conn = new PDO($dsn, "root", "");
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die("Error de conexión: " . $e->getMessage());
            }
        }
        return self::$conn;
    }
}
