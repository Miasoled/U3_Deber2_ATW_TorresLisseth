<?php
$title = "Crear Producto";

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';
    $price = $_POST['price'] ?? '';
    $sku = $_POST['sku'] ?? '';
    $errors = [];
}

if (!isset($name)) {
    $errors = [];
}

if (empty($name)) {
    $errors[] = "El nombre del producto es obligatorio.";
}
if (empty($price)) {
    $errors[] = "El precio es obligatorio.";
} elseif (!is_numeric($price) || $price <= 0) {
    $errors[] = "El precio debe ser un número válido mayor a 0.";
}
if (empty($sku)) {
    $errors[] = "El SKU es obligatorio.";
}
if (empty($description)) {
    $errors[] = "La descripción es obligatoria.";
}

if (empty($errors)){
    $db->query('INSERT INTO products (name, description, price, sku) VALUES (:name, :description, :price, :sku)', [
        'name' => $name,
        'description' => $description,
        'price' => $price,
        'sku' => $sku
    ]);
    header('Location: /products');
    exit;
}

require __DIR__ . '/../../resources/products-create.template.php';
