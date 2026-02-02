<?php
require __DIR__ . '/partials/header.php';
?>

<div class="border-b border-gray-200 pb-8 mb-8">
    <!-- Título del Post -->
    <h2 class="text-4xl font-semibold text-gray-900 sm:text-5xl">
        <?= $post['titulo'] ?>
    </h2>

    <!-- Información del Autor -->
    <p class="text-lg text-gray-600 w-full max-w-4xl mt-4">
        <?= formatear_info_autor($post) ?>
    </p>
</div>

<div>
    <!-- Contenido del Post -->
    <p class="text-sm text-gray-600 mb-6">
        <?= $post['contenido'] ?>
    </p>
</div>

<!-- Metadatos: Contador de Palabras -->
<div class="border-t border-gray-200 pt-6 mb-6">
    <p class="text-sm text-gray-500">
        <strong>Número de palabras:</strong> <?= contar_palabras($post['contenido']) ?>
    </p>
</div>

<!-- Sección de Etiquetas -->
<div class="mb-8 bg-gray-50 rounded-lg p-6">
    <h3 class="text-sm font-semibold text-gray-700 mb-4">Etiquetas:</h3>
    <div class="flex flex-wrap gap-2">
        <?= renderizar_tags_html($post['tags']) ?>
    </div>
</div>

<?php
require __DIR__ . '/partials/footer.php';
?>