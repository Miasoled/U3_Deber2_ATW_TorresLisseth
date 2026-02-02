<?php
$title = "Post";

// Simulación de datos de un post desde un arreglo 
$post = [
    'titulo' => 'Hacking Ético',
    'autor' => 'Lisseth Torres',
    'fecha' => '2026-03-05',
    'contenido' => 'El hacking ético en 2026 ya no es solo buscar vulnerabilidades: es una guerra digital estratégica donde profesionales usan IA ofensiva para simular ataques avanzados, auditan desde metaversos hasta dispositivos médicos con herramientas especializadas, y combaten amenazas quantum-ready mientras enfrentan una demanda laboral brutal, desde la salud digital hasta las finanzas descentralizadas, depende de su habilidad para hackear primero antes de que lo haga el enemigo, todo dentro de un marco ético que ahora también se automatiza.',
    'tags' => ['Hacking', 'Ciberseguridad', 'SeguridadDigital', 'Ciberdefensa']
];

// Formatea la información del autor
function formatear_info_autor(array $postData): string {
    return "Publicado por {$postData['autor']} el {$postData['fecha']}";
}

//Renderiza las etiquetas en HTML
function renderizar_tags_html(array $tags): string {
    $html = '';

    foreach ($tags as $index => $tag) {
        $html .= "<span class='etiqueta px-4 py-2 rounded-full bg-blue-100 text-sm font-semibold  mr-3 mb-3 transition-colors duration-200'>{$tag}</span>";
    }

    return $html;
}

//Cuenta las palabras en el contenido del post
function contar_palabras(string $texto): int {
    // Eliminar espacios múltiples y contar palabras
    $texto = trim($texto);
    $texto = preg_replace('/\s+/', ' ', $texto);

    if (empty($texto)) {
        return 0;
    }

    $palabras = explode(' ', $texto);
    return count($palabras);
}

// Cargar la vista
require __DIR__ . '/../../resources/post.template.php';