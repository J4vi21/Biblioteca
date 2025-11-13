<?php

require_once __DIR__ . '../../APP/Dao/Db.php';
use PDO;
use APP\Dao\Db;

        $this->$conn = Db::getConnection();
    
    
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'devolver') {
    $id_prestamo = $_POST['id_prestamo'];
    
   
    
    $sql = "UPDATE FROM prestamos SET prestado = 0 WHERE id_prestamo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_prestamo);
    
    if($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Préstamo eliminado']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al eliminar']);
    }
    
    $stmt->close();
    exit;
}
?>