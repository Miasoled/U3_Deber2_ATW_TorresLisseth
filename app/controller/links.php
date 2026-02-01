<?php

$title = "Proyectos";

// Arreglo bidimensional que contiene categorías y sus respectivos enlaces
$enlacesCategorizados = [

    // Categoría 1: Herramientas de Desarrollo
    "Herramientas de Desarrollo" => [
        [
            "url"         => "https://git-scm.com/",
            "descripcion" => "Sistema de control de versiones distribuido más utilizado en el mundo."
        ],
        [
            "url"         => "https://code.visualstudio.com/",
            "descripcion" => "Editor de código fuente ligero pero potente, desarrollado por Microsoft."
        ],
        [
            "url"         => "https://www.postmanlabs.com/",
            "descripcion" => "Plataforma para el diseño, prueba y documentación de APIs."
        ]
    ],

    // Categoría 2: Recursos Educativos
    "Recursos Educativos" => [
        [
            "url"         => "https://www.php.net/manual/es/",
            "descripcion" => "Manual oficial de PHP disponible en español para consulta."
        ],
        [
            "url"         => "https://developer.mozilla.org/es/docs/Web",
            "descripcion" => "Recursos completos y actualizados para desarrolladores web."
        ],
        [
            "url"         => "https://www.w3schools.com/",
            "descripcion" => "Tutorial interactivo y referencia rápida de tecnologías web."
        ]
    ],

    // Categoría 3: Frameworks y Tecnologías PHP
    "Frameworks y Tecnologías PHP" => [
        [
            "url"         => "https://laravel.com/",
            "descripcion" => "Framework PHP más popular para el desarrollo de aplicaciones web."
        ],
        [
            "url"         => "https://symfony.com/",
            "descripcion" => "Conjunto de componentes PHP reutilizables y framework de alto rendimiento."
        ],
        [
            "url"         => "https://www.postgresql.org/",
            "descripcion" => "Sistema de base de datos relacional de código abierto más avanzado."
        ]
    ]
];

// Se pasa el arreglo bidimensional a la vista de links template para su renderizado
require __DIR__ . '/../../resources/links.template.php';