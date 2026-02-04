<?php
$title = "Guardar Producto";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';
    $price = $_POST['price'] ?? '';
    $sku = $_POST['sku'] ?? '';
    $errors = [];

    // Validaciones
    if (empty($name)) {
        $errors[] = "El nombre es obligatorio.";
    } elseif (strlen($name) < 3) {
        $errors[] = "El nombre debe tener al menos 3 caracteres.";
    } elseif (strlen($name) > 255) {
        $errors[] = "El nombre no puede tener más de 255 caracteres.";
    }

    if (empty($price)) {
        $errors[] = "El precio es obligatorio.";
    } elseif (!is_numeric($price)) {
        $errors[] = "El precio debe ser un número válido.";
    } elseif ($price < 0) {
        $errors[] = "El precio no puede ser negativo.";
    }

    if (empty($sku)) {
        $errors[] = "El SKU es obligatorio.";
    } elseif (strlen($sku) < 3) {
        $errors[] = "El SKU debe tener al menos 3 caracteres.";
    } elseif (strlen($sku) > 100) {
        $errors[] = "El SKU no puede tener más de 100 caracteres.";
    }

    // Si no hay errores, guardar
    if (empty($errors)) {
        try {
            $db->query('INSERT INTO products (name, description, price, sku) VALUES (:name, :description, :price, :sku)', [
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'sku' => $sku
            ]);
            
            // Guardar mensaje de éxito en sesión
            session_start();
            $_SESSION['alert'] = 'Producto creado correctamente.';
            
            header('Location: /products');
            exit;
        } catch (Exception $e) {
            $errors[] = "Error al guardar el producto. El SKU podría estar duplicado.";
        }
    }
}

// Si hay errores, volver al formulario
require __DIR__ . '/../../resources/products-create.template.php';  