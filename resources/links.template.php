<?php require __DIR__ . '/partials/header.php'; ?>

<div class="border-b border-gray-200 pb-8 mb-8">
   <h2 class="text-4xl font-semibold text-gray-900 sm:text-5xl">Enlaces Categorizados</h2>
   <p class="text-lg text-gray-600 w-full max-w-4xl">
      Explora enlaces útiles organizados por categorías. Cada sección contiene recursos seleccionados relacionados con el desarrollo web.
   </p>
</div>

<div class="w-full">
   <?php
   /* Bucle externo para las categorías */
   foreach ($enlacesCategorizados as $categoria => $enlaces): 
   ?>
      
      <h2 class="text-2xl font-semibold text-gray-900 mt-12 mb-8 border-b border-gray-200 pb-2">
         <?= $categoria ?>
      </h2>

      <div class="grid grid-cols-1 lg:grid-cols-3 gap-x-8 gap-y-12">
         
         <?php 
         /* Bucle interno para los enlaces de esta categoría */
         foreach ($enlaces as $enlace): 
         ?>
            <article class="flex flex-col">
               <h3 class="text-lg font-semibold text-gray-900 hover:text-blue-600 transition-colors">
                  <a href="<?= $enlace['url'] ?>" target="_blank" rel="noopener noreferrer">
                     <?= $enlace['titulo'] ?? $enlace['url'] ?>
                  </a>
               </h3>
               
               <p class="mt-2 text-sm text-gray-600">
                  <?= $enlace['descripcion'] ?>
               </p>
            </article>
         <?php endforeach; ?>

      </div> <?php endforeach; ?>
</div>

<div class="my-16">
   <a href="/links/create" class="text-sm font-semibold text-gray-900">
      Registrar &rarr;
   </a>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>