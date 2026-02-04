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
    <h2 class="text-4xl font-semibold text-gray-900 sm:text-5xl">Editar Producto</h2>
    <p class="text-lg text-gray-600 w-full max-w-4xl">
        Actualiza la información del producto o elimínalo si ya no es necesario.
    </p>
</div>

<?php if (isset($errors) && !empty($errors)): ?>
    <div class="mb-8 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Errores de validación:</strong>
        <ul class="mt-2 list-disc list-inside">
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<div class="max-w-2xl">
    <form method="POST" action="/products/update" class="space-y-6">
        <input type="hidden" name="id" value="<?= htmlspecialchars($product['id']) ?>">
        
        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">
                ID del Producto
            </label>
            <input 
                type="text" 
                value="<?= htmlspecialchars($product['id']) ?>"
                disabled
                class="w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-100 text-gray-600"
            >
        </div>

        <div>
            <label for="name" class="block text-sm font-semibold text-gray-900 mb-2">
                Nombre del Producto <span class="text-red-500">*</span>
            </label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                value="<?= htmlspecialchars($_POST['name'] ?? $product['name']) ?>"
                required
                placeholder="Ej: Laptop Dell Inspiron"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-gray-800 focus:border-transparent"
            >
            <p class="mt-1 text-sm text-gray-600">Mínimo 3 caracteres, máximo 255</p>
        </div>

        <div>
            <label for="description" class="block text-sm font-semibold text-gray-900 mb-2">
                Descripción
            </label>
            <textarea 
                id="description" 
                name="description" 
                rows="4"
                placeholder="Descripción detallada del producto..."
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-gray-800 focus:border-transparent"
            ><?= htmlspecialchars($_POST['description'] ?? $product['description'] ?? '') ?></textarea>
            <p class="mt-1 text-sm text-gray-600">Descripción opcional del producto</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="price" class="block text-sm font-semibold text-gray-900 mb-2">
                    Precio <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-600">$</span>
                    <input 
                        type="number" 
                        step="0.01" 
                        id="price" 
                        name="price" 
                        value="<?= htmlspecialchars($_POST['price'] ?? $product['price']) ?>"
                        required
                        placeholder="0.00"
                        class="w-full pl-8 pr-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-gray-800 focus:border-transparent"
                    >
                </div>
                <p class="mt-1 text-sm text-gray-600">Precio en dólares</p>
            </div>

            <div>
                <label for="sku" class="block text-sm font-semibold text-gray-900 mb-2">
                    SKU <span class="text-red-500">*</span>
                </label>
                <input 
                    type="text" 
                    id="sku" 
                    name="sku" 
                    value="<?= htmlspecialchars($_POST['sku'] ?? $product['sku']) ?>"
                    required
                    placeholder="Ej: PROD-001"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-gray-800 focus:border-transparent font-mono"
                >
                <p class="mt-1 text-sm text-gray-600">Código único del producto</p>
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">
                Fecha de Creación
            </label>
            <input 
                type="text" 
                value="<?= date('d/m/Y H:i:s', strtotime($product['created_at'])) ?>"
                disabled
                class="w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-100 text-gray-600"
            >
        </div>

        <div class="flex gap-4 pt-4">
            <button 
                type="submit" 
                class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded-md font-semibold"
            >
                Actualizar Producto
            </button>
            <a 
                href="/products" 
                class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-2 rounded-md font-semibold"
            >
                Volver a la lista
            </a>
        </div>
    </form>

    <div class="mt-8 pt-8 border-t border-gray-200">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Zona de peligro</h3>
        <form method="POST" action="/products/destroy" style="display: inline;">
            <input type="hidden" name="id" value="<?= htmlspecialchars($product['id']) ?>">
            <button 
                type="submit" 
                class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-md font-semibold"
                onclick="return confirm('¿Estás seguro de eliminar este producto? Esta acción no se puede deshacer.')"
            >
                Eliminar Producto
            </button>
        </form>
    </div>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>