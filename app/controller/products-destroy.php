<?php
$title = "Eliminar Producto";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;

    if ($id) {
        $db->query('DELETE FROM products WHERE id = :id', ['id' => $id]);
        
        // Guardar mensaje de éxito en sesión
        session_start();
        $_SESSION['alert'] = 'Producto eliminado correctamente.';
    }
}

header('Location: /products');
exit;