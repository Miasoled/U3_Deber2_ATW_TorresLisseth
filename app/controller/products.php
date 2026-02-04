<?php
$title = "Productos";
$products = $db->query('SELECT * FROM products ORDER BY id DESC')->get();
require __DIR__ . '/../../resources/products.template.php';