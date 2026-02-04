<?php require __DIR__ . '/partials/header.php'; ?>

<?php
session_start();
if (isset($_SESSION['alert'])):
?>
<div class="mb-8 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
    <span class="block sm:inline"><?= htmlspecialchars($_SESSION['alert']) ?></span>
</div>
<?php
    unset($_SESSION['alert']);
endif;
?>

<div class="border-b border-gray-200 pb-8 mb-8">
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-4xl font-semibold text-gray-900 sm:text-5xl">Gestión de Productos</h2>
            <p class="text-lg text-gray-600 w-full max-w-4xl">
                Administra tu catálogo de productos: consulta, crea, edita y elimina productos de tu inventario.
            </p>
        </div>
    </div>
</div>

<?php if (empty($products)): ?>
    <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative mb-8" role="alert">
        <span class="block sm:inline">No hay productos registrados aún.</span>
    </div>
<?php else: ?>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold">ID</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Nombre</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Descripción</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Precio</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">SKU</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Fecha</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php foreach ($products as $product): ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm text-gray-900"><?= htmlspecialchars($product['id']) ?></td>
                        <td class="px-6 py-4 text-sm font-semibold text-gray-900"><?= htmlspecialchars($product['name']) ?></td>
                        <td class="px-6 py-4 text-sm text-gray-600">
                            <?= htmlspecialchars(substr($product['description'] ?? 'Sin descripción', 0, 50)) ?>
                            <?= strlen($product['description'] ?? '') > 50 ? '...' : '' ?>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900 font-semibold">$<?= number_format($product['price'], 2) ?></td>
                        <td class="px-6 py-4 text-sm text-gray-600 font-mono"><?= htmlspecialchars($product['sku']) ?></td>
                        <td class="px-6 py-4 text-sm text-gray-600"><?= date('d/m/Y', strtotime($product['created_at'])) ?></td>
                        <td class="px-6 py-4 text-sm">
                            <div class="flex gap-2">
                                <a href="/products/edit?id=<?= $product['id'] ?>" 
                                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-xs font-semibold">
                                    Editar
                                </a>
                                <form method="POST" action="/products/destroy" style="display: inline;">
                                    <input type="hidden" name="id" value="<?= $product['id'] ?>">
                                    <button type="submit" 
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs font-semibold"
                                            onclick="return confirm('¿Estás seguro de eliminar este producto?')">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="mt-4 text-sm text-gray-600">
        <strong>Total de productos:</strong> <?= count($products) ?>
    </div>
<?php endif; ?>

<div class="my-16">
    <a href="/products/create" class="text-sm font-semibold text-gray-900 hover:text-gray-600">
        Registrar nuevo producto &rarr;
    </a>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>