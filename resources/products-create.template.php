<?php require __DIR__ . '/partials/header.php'; ?>

<div class="border-b border-gray-200 pb-8 mb-8">
    <h2 class="text-4xl font-semibold text-gray-900 sm:text-5xl">Crear Nuevo Producto</h2>
    <p class="text-lg text-gray-600 w-full max-w-4xl">
        Completa el formulario para registrar un nuevo producto en el sistema.
    </p>
</div>

<div class="max-w-2xl">
    <form method="POST" action="/products/store" class="space-y-6">
        
        <div>
            <label for="name" class="block text-sm font-semibold text-gray-900 mb-2">
                Nombre del Producto <span class="text-red-500">*</span>
            </label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                value="<?= htmlspecialchars($_POST['name'] ?? '') ?>"
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
            ><?= htmlspecialchars($_POST['description'] ?? '') ?></textarea>
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
                        value="<?= htmlspecialchars($_POST['price'] ?? '') ?>"
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
                    value="<?= htmlspecialchars($_POST['sku'] ?? '') ?>"
                    required
                    placeholder="Ej: PROD-001"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-gray-800 focus:border-transparent font-mono"
                >
                <p class="mt-1 text-sm text-gray-600">Código único del producto</p>
            </div>
        </div>

        <div class="flex gap-4 pt-4">
            <button 
                type="submit" 
                class="bg-gray-800 hover:bg-gray-900 text-white px-6 py-2 rounded-md font-semibold"
            >
                Guardar Producto
            </button>
            <a 
                href="/products" 
                class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-2 rounded-md font-semibold"
            >
                Cancelar
            </a>
        </div>
    </form>
</div>

<div class="my-16">
    <a href="/products" class="text-sm font-semibold text-gray-900 hover:text-gray-600">
        &larr; Volver a la lista
    </a>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>