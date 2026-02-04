<?php
$title = "Actualizar Producto";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';
    $price = $_POST['price'] ?? '';
    $sku = $_POST['sku'] ?? '';
    $errors = [];

    // Validaciones
    if (empty($id)) {
        $errors[] = "ID del producto no válido.";
    }

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

    // Si no hay errores, actualizar
    if (empty($errors)) {
        try {
            $db->query(
                'UPDATE products SET name = :name, description = :description, price = :price, sku = :sku WHERE id = :id',
                [
                    'id' => $id,
                    'name' => $name,
                    'description' => $description,
                    'price' => $price,
                    'sku' => $sku
                ]
            );
            
            // Guardar mensaje de éxito en sesión
            session_start();
            $_SESSION['alert'] = 'Producto actualizado correctamente.';
            
            header('Location: /products/edit?id=' . $id);
            exit;
        } catch (Exception $e) {
            $errors[] = "Error al actualizar el producto. El SKU podría estar duplicado.";
        }
    }
    
    // Si hay errores, obtener el producto y volver al formulario
    $product = $db->query('SELECT * FROM products WHERE id = :id', ['id' => $id])->first();
    require __DIR__ . '/../../resources/products-edit.template.php';
} else {
    header('Location: /products');
    exit;
}