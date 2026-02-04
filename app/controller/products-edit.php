<?php
$title = "Editar Producto";

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: /products');
    exit;
}

$product = $db->query('SELECT * FROM products WHERE id = :id', ['id' => $id])->first();

if (!$product) {
    header('Location: /products');
    exit;
}

require __DIR__ . '/../../resources/products-edit.template.php';